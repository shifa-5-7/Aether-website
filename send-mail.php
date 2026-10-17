<?php
// Aether Interiors — contact-form mailer.
// Uses PHP's built-in mail() function, which GoDaddy shared hosting
// supports by default. No account, no API key, nothing to sign up for.

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false]);
    exit;
}

$to = 'aetherwoods.crafts@gmail.com';

$name    = trim(strip_tags($_POST['name'] ?? ''));
$contact = trim(strip_tags($_POST['contact'] ?? ''));
$message = trim(strip_tags($_POST['message'] ?? '')) ?: '—';
$honey   = trim($_POST['honeypot'] ?? ''); // hidden field — real visitors never fill this in

// Silently pretend success for bots that fill in the hidden field.
if ($honey !== '') {
    echo json_encode(['success' => true]);
    exit;
}

if ($name === '' || $contact === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Name and contact are required.']);
    exit;
}

$subject = 'New project inquiry — ' . $name;
$body    = "Name: $name\nContact: $contact\n\nProject details:\n$message";
$safeContact = preg_replace('/[\r\n]/', '', $contact); // guard against header injection
$headers = "From: website@aetherinteriors.in\r\nReply-To: $safeContact";

$sent = mail($to, $subject, $body, $headers);

echo json_encode(['success' => (bool) $sent]);
