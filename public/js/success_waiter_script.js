document.addEventListener('DOMContentLoaded', () => {
    const delay = 5000; // Délai avant la redirection (3 secondes)
    const progressBar = document.querySelector('.progress-bar');

    // Calcul du pourcentage de progression
    let progress = 0;
    const interval = 100; // Intervalle de mise à jour en millisecondes
    const step = (100 * interval) / delay;

    const updateProgress = setInterval(() => {
        progress += step;
        if (progress >= 100) {
            progress = 100;
            clearInterval(updateProgress);
        }
        progressBar.style.width = progress + '%';
    }, interval);

    setTimeout(() => {
        window.location.href = 'logIn.php'; // Remplacez par l'URL de votre page de connexion
    }, delay);
});
