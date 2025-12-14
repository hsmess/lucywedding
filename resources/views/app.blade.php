<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montaga&display=swap" rel="stylesheet">


    <head>
        <!-- Existing head content -->

        <!-- Open Graph / Social Media Meta Tags -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="Lucy & Greg - Wedding - 27th June 2026">
        <meta property="og:description" content="Join us to celebrate our wedding in Liverpool">
        <meta property="og:image" content="https://aardvark-cdn.s3.eu-west-2.amazonaws.com/82707EAE-117A-407D-B46F-A6ADA6E8952B.jpeg">
        <meta property="og:url" content="{{ url()->current() }}">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Lucy & Greg - Wedding - 27th June 2026">
        <meta name="twitter:description" content="Join us to celebrate our wedding in Liverpool">
        <meta name="twitter:image" content="https://aardvark-cdn.s3.eu-west-2.amazonaws.com/82707EAE-117A-407D-B46F-A6ADA6E8952B.jpeg">
    </head>



    @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
    @inertiaHead
</head>
<body class="font-sans antialiased bg-[#FCF9F7] text-[#2B1105]">
@inertia
</body>
</html>
