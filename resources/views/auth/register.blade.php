<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Espace Gestion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }

        /* Animations personnalisées */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }

        @keyframes blob {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33% { transform: translate(30px, -40px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes shine {
            0% { background-position: -200%; }
            100% { background-position: 200%; }
        }

        @keyframes ripple {
            0% { transform: scale(0); opacity: 0.5; }
            100% { transform: scale(4); opacity: 0; }
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-blob {
            animation: blob 12s infinite;
        }

        .animate-slide-in {
            animation: slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out;
        }

        .animation-delay-100 { animation-delay: 0.1s; }
        .animation-delay-200 { animation-delay: 0.2s; }
        .animation-delay-300 { animation-delay: 0.3s; }
        .animation-delay-400 { animation-delay: 0.4s; }
        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }

        /* Effets de glassmorphism */
        .glass-card {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Styles des champs */
        .input-modern {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .input-modern:focus {
            transform: translateY(-1px);
        }

        /* Effet de ripple sur les boutons */
        .ripple-effect {
            position: relative;
            overflow: hidden;
        }

        .ripple-effect::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .ripple-effect:active::after {
            width: 300px;
            height: 300px;
        }

        /* Loader spinner */
        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255,255,255,0.3);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }

        /* Scrollbar personnalisée */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
        }

        /* Tooltip personnalisé */
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltip-text {
            visibility: hidden;
            background-color: #1f2937;
            color: #fff;
            text-align: center;
            padding: 5px 10px;
            border-radius: 8px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            white-space: nowrap;
            font-size: 12px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }

        /* Validation des champs */
        .input-success {
            border-color: #10b981 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%2310b981'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.25rem;
        }

        .input-error {
            border-color: #ef4444 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23ef4444'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 18L18 6M6 6l12 12'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.25rem;
        }

        /* Password strength indicator */
        .strength-bar {
            height: 4px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .strength-weak { width: 25%; background: #ef4444; }
        .strength-medium { width: 50%; background: #f59e0b; }
        .strength-strong { width: 75%; background: #10b981; }
        .strength-very-strong { width: 100%; background: #059669; }
    </style>
</head>
<body class="relative overflow-x-hidden" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">

    <!-- Particules animées -->
    <div id="particles" class="fixed inset-0 pointer-events-none z-0"></div>

    <!-- Éléments décoratifs -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-40 -right-32 w-96 h-96 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute -bottom-40 -left-32 w-96 h-96 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-r from-indigo-400 to-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>
        
        <!-- Cercles flottants -->
        <div class="absolute top-20 left-10 w-32 h-32 border-4 border-white/20 rounded-full animate-float"></div>
        <div class="absolute bottom-20 right-10 w-48 h-48 border-4 border-white/20 rounded-full animate-float animation-delay-2000"></div>
        <div class="absolute top-1/3 right-1/4 w-24 h-24 border-2 border-white/10 rounded-full animate-float animation-delay-4000"></div>
    </div>

    <div class="relative z-10 min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-2xl animate-fade-in">
            
            <!-- Carte principale -->
            <div class="glass-card rounded-3xl shadow-2xl overflow-hidden animate-slide-in">
                
                <!-- En-tête avec dégradé -->
                <div class="relative bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-10 text-center">
                    <div class="absolute inset-0 bg-black/10"></div>
                    <div class="relative">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-2xl backdrop-blur-sm mb-4 transform rotate-3 hover:rotate-6 transition-transform duration-300">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                            </svg>
                        </div>
                        <h1 class="text-4xl font-bold text-white mb-2">Créer un compte</h1>
                        <p class="text-indigo-100">Rejoignez notre plateforme de gestion</p>
                    </div>
                </div>

                <!-- Formulaire -->
                <div class="p-8 md:p-10">
                    <!-- Message d'erreur -->
                    <div id="errorMessage" class="hidden mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl text-sm animate-shake">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span id="errorText"></span>
                        </div>
                    </div>

                    <form id="registerForm" method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf
                        <!-- Nom et Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div class="space-y-2 animate-slide-in animation-delay-100">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-1">
                                    Nom complet
                                    <span class="text-red-500">*</span>
                                    <div class="tooltip ml-1">
                                        <svg class="w-4 h-4 text-gray-400 cursor-help" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span class="tooltip-text">Votre nom complet tel qu'il apparaîtra sur votre profil</span>
                                    </div>
                                </label>
                                <input type="text" id="name" name="name" required
                                    class="input-modern w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 text-gray-900 text-sm rounded-xl focus:border-indigo-500 focus:bg-white focus:outline-none transition-all"
                                    placeholder="Jean Dupont">
                                <div class="text-xs text-gray-500 hidden" id="nameHint">Minimum 3 caractères</div>
                            </div>

                            <div class="space-y-2 animate-slide-in animation-delay-200">
                                <label class="text-sm font-semibold text-gray-700 flex items-center gap-1">
                                    Email
                                    <span class="text-red-500">*</span>
                                </label>
                                <input type="email" id="email" name="email" required
                                    class="input-modern w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 text-gray-900 text-sm rounded-xl focus:border-indigo-500 focus:bg-white focus:outline-none transition-all"
                                    placeholder="jean@entreprise.com">
                                <div class="text-xs text-gray-500 hidden" id="emailHint">Ex: nom@domaine.com</div>
                            </div>
                        </div>

                        <!-- Mot de passe -->
                        <div class="space-y-2 animate-slide-in animation-delay-300">
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-1">
                                Mot de passe
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="password" id="password" name="password" required
                                    class="input-modern w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 text-gray-900 text-sm rounded-xl focus:border-indigo-500 focus:bg-white focus:outline-none transition-all pr-12"
                                    placeholder="Créez un mot de passe sécurisé">
                                <button type="button" id="togglePassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-indigo-600 transition-colors">
                                    <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                            
                            <!-- Indicateur de force du mot de passe -->
                            <div class="mt-2 space-y-2">
                                <div class="flex gap-1">
                                    <div class="strength-bar" id="strengthBar1"></div>
                                    <div class="strength-bar" id="strengthBar2"></div>
                                    <div class="strength-bar" id="strengthBar3"></div>
                                    <div class="strength-bar" id="strengthBar4"></div>
                                </div>
                                <div class="flex justify-between text-xs">
                                    <span id="strengthText" class="text-gray-500">Force du mot de passe</span>
                                    <span id="strengthLabel" class="font-semibold"></span>
                                </div>
                            </div>
                            
                            <div class="text-xs text-gray-500 mt-1">Minimum 8 caractères, 1 majuscule, 1 chiffre</div>
                        </div>

                        <!-- Confirmation mot de passe -->
                        <div class="space-y-2 animate-slide-in animation-delay-400">
                            <label class="text-sm font-semibold text-gray-700 flex items-center gap-1">
                                Confirmer le mot de passe
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="input-modern w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 text-gray-900 text-sm rounded-xl focus:border-indigo-500 focus:bg-white focus:outline-none transition-all pr-12"
                                    placeholder="Confirmez votre mot de passe">
                                <button type="button" id="toggleConfirmPassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-indigo-600 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="text-xs text-gray-500 hidden" id="passwordMatchHint">Les mots de passe ne correspondent pas</div>
                        </div>

                        <!-- Conditions d'utilisation -->
                        <div class="flex items-start gap-3 pt-2 animate-slide-in animation-delay-400">
                            <input type="checkbox" id="terms" required class="mt-1 w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="terms" class="text-sm text-gray-600">
                                J'accepte les 
                                <a href="#" class="text-indigo-600 hover:text-indigo-500 font-medium hover:underline">conditions d'utilisation</a> 
                                et la 
                                <a href="#" class="text-indigo-600 hover:text-indigo-500 font-medium hover:underline">politique de confidentialité</a>
                            </label>
                        </div>

                        <!-- Bouton d'inscription -->
                        <button type="submit" id="submitBtn" 
                            class="ripple-effect w-full mt-6 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-0.5 active:scale-95 transition-all duration-200 flex items-center justify-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed">
                            <span id="btnText">Créer mon compte</span>
                            <span id="btnSpinner" class="hidden">
                                <div class="spinner"></div>
                            </span>
                        </button>
                    </form>

                    <!-- Séparateur -->
                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-200"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-4 bg-white text-gray-500">Ou</span>
                        </div>
                    </div>

                    <!-- Lien de connexion -->
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Déjà inscrit ? 
                            <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-500 hover:underline transition-colors">
                                Se connecter ici
                            </a>
                        </p>
                    </div>

                    <!-- Footer -->
                    <div class="mt-8 pt-6 border-t border-gray-200 text-center">
                        <p class="text-xs text-gray-500">
                            &copy; 2026 NARSA. Tous droits réservés.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Génération des particules
        function createParticles() {
            const container = document.getElementById('particles');
            if (!container) return;
            
            const particleCount = 50;
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.style.position = 'absolute';
                particle.style.background = `rgba(255, 255, 255, ${Math.random() * 0.3 + 0.1})`;
                particle.style.borderRadius = '50%';
                const size = Math.random() * 4 + 2;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.left = `${Math.random() * 100}%`;
                particle.style.top = `${Math.random() * 100}%`;
                particle.style.animation = `float ${Math.random() * 10 + 10}s ease-in-out infinite`;
                particle.style.animationDelay = `${Math.random() * 5}s`;
                container.appendChild(particle);
            }
        }

        // Vérification de la force du mot de passe
        function checkPasswordStrength(password) {
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;
            
            return strength;
        }

        function updateStrengthIndicator(password) {
            const strength = checkPasswordStrength(password);
            const bars = ['strengthBar1', 'strengthBar2', 'strengthBar3', 'strengthBar4'];
            const labels = ['Très faible', 'Faible', 'Moyen', 'Fort', 'Très fort'];
            const colors = ['#ef4444', '#f59e0b', '#fbbf24', '#10b981', '#059669'];
            
            // Reset all bars
            bars.forEach(barId => {
                const bar = document.getElementById(barId);
                if (bar) {
                    bar.style.background = '#e5e7eb';
                    bar.style.width = '25%';
                }
            });
            
            if (password.length === 0) {
                document.getElementById('strengthText').innerHTML = 'Force du mot de passe';
                document.getElementById('strengthLabel').innerHTML = '';
                return;
            }
            
            // Set active bars
            for (let i = 0; i < strength; i++) {
                const bar = document.getElementById(bars[i]);
                if (bar) bar.style.background = colors[strength];
            }
            
            const strengthText = labels[strength];
            document.getElementById('strengthText').innerHTML = 'Force du mot de passe :';
            document.getElementById('strengthLabel').innerHTML = strengthText;
            document.getElementById('strengthLabel').style.color = colors[strength];
        }

        // Validation du formulaire
        function validateForm() {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const terms = document.getElementById('terms').checked;
            
            let isValid = true;
            let errorMessage = '';
            
            if (name.length < 3) {
                errorMessage = 'Le nom doit contenir au moins 3 caractères';
                isValid = false;
            } else if (!email.match(/^[^\s@]+@([^\s@.,]+\.)+[^\s@.,]{2,}$/)) {
                errorMessage = 'Veuillez entrer une adresse email valide';
                isValid = false;
            } else if (password.length < 8) {
                errorMessage = 'Le mot de passe doit contenir au moins 8 caractères';
                isValid = false;
            } else if (!password.match(/[A-Z]/)) {
                errorMessage = 'Le mot de passe doit contenir au moins une majuscule';
                isValid = false;
            } else if (!password.match(/[0-9]/)) {
                errorMessage = 'Le mot de passe doit contenir au moins un chiffre';
                isValid = false;
            } else if (password !== confirmPassword) {
                errorMessage = 'Les mots de passe ne correspondent pas';
                isValid = false;
            } else if (!terms) {
                errorMessage = 'Vous devez accepter les conditions d\'utilisation';
                isValid = false;
            }
            
            if (!isValid) {
                const errorDiv = document.getElementById('errorMessage');
                const errorText = document.getElementById('errorText');
                errorText.innerHTML = errorMessage;
                errorDiv.classList.remove('hidden');
                
                setTimeout(() => {
                    errorDiv.classList.add('hidden');
                }, 5000);
            }
            
            return isValid;
        }

        // Événements DOM
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            
            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = document.getElementById('btnText');
            const btnSpinner = document.getElementById('btnSpinner');
            const form = document.getElementById('registerForm');
            
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirm = document.getElementById('toggleConfirmPassword');
            
            if (togglePassword) {
                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    const icon = togglePassword.querySelector('svg');
                    if (type === 'text') {
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>';
                    } else {
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>';
                    }
                });
            }
            
            if (toggleConfirm) {
                toggleConfirm.addEventListener('click', function() {
                    const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirmPasswordInput.setAttribute('type', type);
                });
            }
            
            // Vérification de la force du mot de passe
            if (passwordInput) {
                passwordInput.addEventListener('input', function() {
                    updateStrengthIndicator(this.value);
                });
            }
            
            // Vérification de la correspondance des mots de passe
            if (confirmPasswordInput) {
                confirmPasswordInput.addEventListener('input', function() {
                    const password = passwordInput.value;
                    const hint = document.getElementById('passwordMatchHint');
                    if (hint) {
                        if (this.value && this.value !== password) {
                            hint.classList.remove('hidden');
                            this.classList.add('input-error');
                            this.classList.remove('input-success');
                        } else if (this.value === password && password) {
                            hint.classList.add('hidden');
                            this.classList.add('input-success');
                            this.classList.remove('input-error');
                        } else {
                            hint.classList.add('hidden');
                            this.classList.remove('input-error', 'input-success');
                        }
                    }
                });
            }
            
            // Validation en temps réel des champs
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');
            
            if (nameInput) {
                nameInput.addEventListener('input', function() {
                    if (this.value.length >= 3) {
                        this.classList.add('input-success');
                        this.classList.remove('input-error');
                    } else if (this.value.length > 0) {
                        this.classList.add('input-error');
                        this.classList.remove('input-success');
                    } else {
                        this.classList.remove('input-error', 'input-success');
                    }
                });
            }
            
            if (emailInput) {
                emailInput.addEventListener('input', function() {
                    const isValid = this.value.match(/^[^\s@]+@([^\s@.,]+\.)+[^\s@.,]{2,}$/);
                    if (isValid) {
                        this.classList.add('input-success');
                        this.classList.remove('input-error');
                    } else if (this.value.length > 0) {
                        this.classList.add('input-error');
                        this.classList.remove('input-success');
                    } else {
                        this.classList.remove('input-error', 'input-success');
                    }
                });
            }
            
            // Soumission du formulaire
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    if (validateForm()) {
                        // Afficher le loader
                        btnText.classList.add('hidden');
                        btnSpinner.classList.remove('hidden');
                        submitBtn.disabled = true;
                        
                        // Soumettre le formulaire au backend
                        form.submit();
                    }
                });
            }
        });
    </script>
</body>
</html>