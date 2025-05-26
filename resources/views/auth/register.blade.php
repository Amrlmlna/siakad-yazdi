<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | SIAKAD Untad</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .glass-card {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        }
        
        .input-field, .select-field {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .input-field:focus, .select-field:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(16, 185, 129, 0.5);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #10b981, #059669);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #059669, #047857);
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        }
        
        .logo-container {
            background: linear-gradient(135deg, #10b981, #059669);
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .academic-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(16, 185, 129, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(5, 150, 105, 0.1) 0%, transparent 50%);
        }
        
        .fade-in {
            animation: fadeIn 0.8s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .step-indicator {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(16, 185, 129, 0.3);
        }
        
        .step-indicator.active {
            background: linear-gradient(135deg, #10b981, #059669);
            border-color: #10b981;
        }

        .role-card {
            background: rgba(255, 255, 255, 0.03);
            border: 2px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .role-card:hover {
            border-color: rgba(16, 185, 129, 0.3);
            background: rgba(255, 255, 255, 0.05);
        }

        .role-card.selected {
            border-color: #10b981;
            background: rgba(16, 185, 129, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 min-h-screen academic-pattern">
    
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md fade-in">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="logo-container w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i data-lucide="user-plus" class="w-8 h-8 text-white"></i>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Create Account</h1>
                <p class="text-gray-400">Join the SIAKAD academic community</p>
            </div>

            <!-- Progress Steps -->
            <div class="flex justify-center mb-8">
                <div class="flex items-center space-x-4">
                    <div class="step-indicator active w-8 h-8 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-semibold">1</span>
                    </div>
                    <div class="w-12 h-0.5 bg-gray-600"></div>
                    <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center">
                        <span class="text-gray-400 text-sm font-semibold">2</span>
                    </div>
                </div>
            </div>

            <!-- Register Form -->
            <div class="glass-card rounded-2xl p-8">
                <form action="{{ route('auth.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Role Selection -->
                    <div class="space-y-3">
                        <label class="block text-sm font-medium text-gray-300">
                            Select Your Role
                        </label>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="role-card rounded-xl p-3 text-center" data-role="admin">
                                <i data-lucide="shield" class="w-6 h-6 text-blue-400 mx-auto mb-2"></i>
                                <p class="text-xs text-gray-300 font-medium">Admin</p>
                            </div>
                            <div class="role-card rounded-xl p-3 text-center" data-role="dosen">
                                <i data-lucide="user-check" class="w-6 h-6 text-purple-400 mx-auto mb-2"></i>
                                <p class="text-xs text-gray-300 font-medium">Dosen</p>
                            </div>
                            <div class="role-card rounded-xl p-3 text-center" data-role="mahasiswa">
                                <i data-lucide="graduation-cap" class="w-6 h-6 text-emerald-400 mx-auto mb-2"></i>
                                <p class="text-xs text-gray-300 font-medium">Mahasiswa</p>
                            </div>
                        </div>
                        <input type="hidden" name="role" id="role" required>
                        @error('role')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Username Field -->
                    <div class="space-y-2">
                        <label for="username" class="block text-sm font-medium text-gray-300">
                            Username
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="user" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input 
                                type="text" 
                                id="username"
                                name="username" 
                                placeholder="Choose a username" 
                                class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                                required
                                value="{{ old('username') }}"
                            >
                        </div>
                        @error('username')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-300">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="mail" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input 
                                type="email" 
                                id="email"
                                name="email" 
                                placeholder="Enter your email address" 
                                class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                                required
                                value="{{ old('email') }}"
                            >
                        </div>
                        @error('email')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-300">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="lock" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password"
                                name="password" 
                                placeholder="Create a strong password" 
                                class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                                required
                            >
                        </div>
                        @error('password')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-300">
                            Confirm Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i data-lucide="shield-check" class="w-5 h-5 text-gray-400"></i>
                            </div>
                            <input 
                                type="password" 
                                id="password_confirmation"
                                name="password_confirmation" 
                                placeholder="Confirm your password" 
                                class="input-field w-full pl-10 pr-4 py-3 rounded-xl text-white placeholder-gray-400 focus:outline-none"
                                required
                            >
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <input 
                            type="checkbox" 
                            id="terms"
                            name="terms"
                            class="w-4 h-4 mt-1 text-emerald-600 bg-transparent border-gray-600 rounded focus:ring-emerald-500 focus:ring-2"
                            required
                        >
                        <label for="terms" class="ml-3 text-sm text-gray-300">
                            I agree to the 
                            <a href="#" class="text-emerald-400 hover:text-emerald-300 transition-colors">Terms of Service</a> 
                            and 
                            <a href="#" class="text-emerald-400 hover:text-emerald-300 transition-colors">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="btn-primary w-full py-3 text-white font-semibold rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-slate-900"
                    >
                        Create Account
                    </button>
                </form>

                <!-- Divider -->
                <div class="mt-8 pt-6 border-t border-gray-700">
                    <p class="text-center text-gray-400">
                        Already have an account? 
                        <a href="{{ route('auth.login') }}" class="text-emerald-400 hover:text-emerald-300 font-medium transition-colors">
                            Sign In
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8">
                <p class="text-gray-500 text-sm">
                    © 2025 SIAKAD Universitas Tadulako
                </p>
            </div>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Role selection functionality
        const roleCards = document.querySelectorAll('.role-card');
        const roleInput = document.getElementById('role');
        
        roleCards.forEach(card => {
            card.addEventListener('click', function() {
                // Remove selected class from all cards
                roleCards.forEach(c => c.classList.remove('selected'));
                
                // Add selected class to clicked card
                this.classList.add('selected');
                
                // Set the role value
                const role = this.getAttribute('data-role');
                roleInput.value = role;
            });
        });

        // Set default role if old value exists
        const oldRole = "{{ old('role') }}";
        if (oldRole) {
            const defaultCard = document.querySelector(`[data-role="${oldRole}"]`);
            if (defaultCard) {
                defaultCard.classList.add('selected');
                roleInput.value = oldRole;
            }
        }
        
        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        
        // Real-time password confirmation validation
        confirmPasswordInput.addEventListener('input', function() {
            if (this.value !== passwordInput.value) {
                this.style.borderColor = 'rgba(239, 68, 68, 0.5)';
            } else {
                this.style.borderColor = 'rgba(16, 185, 129, 0.5)';
            }
        });
        
        // Add loading state to form
        document.querySelector('form').addEventListener('submit', function(e) {
            if (!roleInput.value) {
                e.preventDefault();
                alert('Please select your role first');
                return;
            }
            
            const button = this.querySelector('button[type="submit"]');
            button.innerHTML = '<i data-lucide="loader-2" class="w-5 h-5 animate-spin mx-auto"></i>';
            button.disabled = true;
            lucide.createIcons();
        });
    </script>
</body>
</html>
