<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Test - SMTP Testing</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Email Test - SMTP Configuration</h1>
            <p class="text-gray-600 mb-6">Test email sending functionality with GoDaddy Hosting SMTP (FREE) or custom SMTP settings</p>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <strong>Error!</strong> {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('test-email.send') }}" class="space-y-6">
                @csrf

                <!-- Email Details -->
                <div class="border-b border-gray-200 pb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Email Details</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="to" class="block text-sm font-medium text-gray-700 mb-2">
                                Recipient Email <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="to" 
                                name="to" 
                                value="{{ old('to') }}" 
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="recipient@example.com"
                            >
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                Subject <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="subject" 
                                name="subject" 
                                value="{{ old('subject', 'Test Email') }}" 
                                required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="Test Email Subject"
                            >
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                            Message Body <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="6" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            placeholder="Enter your test message here...">{{ old('message', 'This is a test email from the SMTP testing tool.') }}</textarea>
                    </div>
                </div>

                <!-- Quick Preset Configurations -->
                <div class="border-b border-gray-200 pb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Quick Preset Configurations</h2>
                    <p class="text-sm text-gray-600 mb-4">Click a preset button to auto-fill SMTP settings (no email purchase required for hosting SMTP)</p>
                    
                    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-3 mb-4">
                        <p class="text-sm text-yellow-800">
                            <strong>💡 Recommended:</strong> Try <strong>localhost</strong> first (most reliable). If that doesn't work, try <strong>Sendmail</strong>. Relay server may be blocked by your hosting provider.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-4">
                        <button 
                            type="button" 
                            onclick="applyPreset('localhost')" 
                            class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors text-sm font-semibold"
                        >
                            ✅ Try Localhost First (Recommended)
                        </button>
                        <button 
                            type="button" 
                            onclick="applyPreset('sendmail')" 
                            class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-colors text-sm"
                        >
                            Use Sendmail (Alternative)
                        </button>
                        <button 
                            type="button" 
                            onclick="applyPreset('relay')" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors text-sm opacity-75"
                            title="May not work if relay server is blocked"
                        >
                            Use Relay Server (May Fail)
                        </button>
                    </div>

                    <!-- Instructions Section -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-4">
                        <h3 class="text-sm font-semibold text-blue-800 mb-2">Quick Setup Guide:</h3>
                        <ol class="text-xs text-blue-700 space-y-1 list-decimal list-inside">
                            <li><strong>First, try Localhost:</strong> Click "Try Localhost First" button above - no credentials needed!</li>
                            <li><strong>If localhost fails:</strong> Try "Use Sendmail" button - works on most shared hosting</li>
                            <li><strong>Relay server:</strong> Only try if both above fail (may be blocked by hosting provider)</li>
                            <li><strong>cPanel check:</strong> Log in to <code class="bg-blue-100 px-1 rounded">yourdomain.com/cpanel</code> → Email → Email Routing to verify settings</li>
                        </ol>
                        <p class="text-xs text-blue-600 mt-2 italic">
                            Note: Port 25 (localhost) is usually the most reliable option on GoDaddy shared hosting.
                        </p>
                    </div>
                </div>

                <!-- SMTP Configuration (Optional) -->
                <div class="border-b border-gray-200 pb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-xl font-semibold text-gray-800">SMTP Configuration (Optional)</h2>
                        <button 
                            type="button" 
                            onclick="toggleSmtpConfig()" 
                            class="text-sm text-blue-600 hover:text-blue-800"
                        >
                            <span id="toggle-text">Show</span> SMTP Settings
                        </button>
                    </div>
                    <p class="text-sm text-gray-600 mb-4">Leave empty to use default .env configuration. Click presets above for quick setup.</p>

                    <div id="smtp-config" class="hidden space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="smtp_host" class="block text-sm font-medium text-gray-700 mb-2">
                                    SMTP Host
                                </label>
                                <input 
                                    type="text" 
                                    id="smtp_host" 
                                    name="smtp_host" 
                                    value="{{ old('smtp_host', config('mail.mailers.smtp.host')) }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="localhost or relay-hosting.secureserver.net"
                                >
                            </div>

                            <div>
                                <label for="smtp_port" class="block text-sm font-medium text-gray-700 mb-2">
                                    SMTP Port
                                </label>
                                <input 
                                    type="number" 
                                    id="smtp_port" 
                                    name="smtp_port" 
                                    value="{{ old('smtp_port', config('mail.mailers.smtp.port')) }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="25 (localhost) or 587 (relay)"
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="smtp_username" class="block text-sm font-medium text-gray-700 mb-2">
                                    SMTP Username (Email)
                                </label>
                                <input 
                                    type="text" 
                                    id="smtp_username" 
                                    name="smtp_username" 
                                    value="{{ old('smtp_username', config('mail.mailers.smtp.username')) }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="Leave empty for localhost, or cPanel username for relay"
                                >
                            </div>

                            <div>
                                <label for="smtp_password" class="block text-sm font-medium text-gray-700 mb-2">
                                    SMTP Password
                                </label>
                                <input 
                                    type="password" 
                                    id="smtp_password" 
                                    name="smtp_password" 
                                    value="{{ old('smtp_password') }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="Your SMTP password"
                                >
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label for="smtp_encryption" class="block text-sm font-medium text-gray-700 mb-2">
                                    Encryption
                                </label>
                                <select 
                                    id="smtp_encryption" 
                                    name="smtp_encryption" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                >
                                    <option value="">None (for localhost:25)</option>
                                    <option value="ssl" {{ old('smtp_encryption', config('mail.mailers.smtp.encryption')) === 'ssl' ? 'selected' : '' }}>SSL</option>
                                    <option value="tls" {{ old('smtp_encryption', config('mail.mailers.smtp.encryption')) === 'tls' ? 'selected' : '' }}>TLS (for relay:587)</option>
                                </select>
                            </div>
                            <div>
                                <label for="mailer_type" class="block text-sm font-medium text-gray-700 mb-2">
                                    Mailer Type
                                </label>
                                <select 
                                    id="mailer_type" 
                                    name="mailer_type" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    onchange="handleMailerTypeChange()"
                                >
                                    <option value="smtp">SMTP</option>
                                    <option value="sendmail">Sendmail</option>
                                    <option value="log">Log (Debug - writes to log file)</option>
                                </select>
                            </div>

                            <div>
                                <label for="from_email" class="block text-sm font-medium text-gray-700 mb-2">
                                    From Email
                                </label>
                                <input 
                                    type="email" 
                                    id="from_email" 
                                    name="from_email" 
                                    value="{{ old('from_email', config('mail.from.address')) }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="from@yourdomain.com"
                                >
                            </div>

                            <div>
                                <label for="from_name" class="block text-sm font-medium text-gray-700 mb-2">
                                    From Name
                                </label>
                                <input 
                                    type="text" 
                                    id="from_name" 
                                    name="from_name" 
                                    value="{{ old('from_name', config('mail.from.name')) }}" 
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="Your Name"
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Current Configuration Display -->
                <div class="bg-gray-50 rounded-lg p-4">
                    <h3 class="text-sm font-semibold text-gray-700 mb-2">Current .env Configuration:</h3>
                    <div class="text-xs text-gray-600 space-y-1 font-mono">
                        <div>Host: {{ config('mail.mailers.smtp.host') ?: 'Not set' }}</div>
                        <div>Port: {{ config('mail.mailers.smtp.port') ?: 'Not set' }}</div>
                        <div>Username: {{ config('mail.mailers.smtp.username') ?: 'Not set' }}</div>
                        <div>Encryption: {{ config('mail.mailers.smtp.encryption') ?: 'Not set' }}</div>
                        <div>From: {{ config('mail.from.address') ?: 'Not set' }} ({{ config('mail.from.name') ?: 'Not set' }})</div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end space-x-4">
                    <button 
                        type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors"
                    >
                        Send Test Email
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleSmtpConfig() {
            const config = document.getElementById('smtp-config');
            const toggleText = document.getElementById('toggle-text');
            
            if (config.classList.contains('hidden')) {
                config.classList.remove('hidden');
                toggleText.textContent = 'Hide';
            } else {
                config.classList.add('hidden');
                toggleText.textContent = 'Show';
            }
        }

        function applyPreset(type) {
            // Show SMTP config section if hidden
            const config = document.getElementById('smtp-config');
            if (config.classList.contains('hidden')) {
                config.classList.remove('hidden');
                document.getElementById('toggle-text').textContent = 'Hide';
            }

            if (type === 'localhost') {
                // GoDaddy Hosting SMTP - Localhost
                document.getElementById('smtp_host').value = 'localhost';
                document.getElementById('smtp_port').value = '25';
                document.getElementById('smtp_username').value = '';
                document.getElementById('smtp_password').value = '';
                document.getElementById('smtp_encryption').value = '';
                document.getElementById('mailer_type').value = 'smtp';
                handleMailerTypeChange();
            } else if (type === 'relay') {
                // GoDaddy Hosting SMTP - Relay
                document.getElementById('smtp_host').value = 'relay-hosting.secureserver.net';
                document.getElementById('smtp_port').value = '587';
                document.getElementById('smtp_username').value = '';
                document.getElementById('smtp_password').value = '';
                document.getElementById('smtp_encryption').value = 'tls';
                document.getElementById('mailer_type').value = 'smtp';
                handleMailerTypeChange();
                alert('Please enter your cPanel username and password in the SMTP Username and Password fields.');
            } else if (type === 'sendmail') {
                // Sendmail transport
                document.getElementById('mailer_type').value = 'sendmail';
                handleMailerTypeChange();
            }
        }

        function handleMailerTypeChange() {
            const mailerType = document.getElementById('mailer_type').value;
            const smtpFields = document.getElementById('smtp-config');
            const smtpInputs = smtpFields.querySelectorAll('input, select');
            
            if (mailerType === 'sendmail' || mailerType === 'log') {
                // Hide SMTP fields for sendmail and log
                smtpInputs.forEach(input => {
                    if (input.id !== 'mailer_type' && input.id !== 'from_email' && input.id !== 'from_name') {
                        input.disabled = true;
                        input.style.opacity = '0.5';
                    }
                });
            } else {
                // Show SMTP fields
                smtpInputs.forEach(input => {
                    input.disabled = false;
                    input.style.opacity = '1';
                });
            }
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            handleMailerTypeChange();
        });
    </script>
</body>
</html>

