if (document.querySelector('#mapa')) {
    const lat = 39.563194;
    const lng = 2.665722;
    const zoom = 16;

    const map = L.map('mapa').setView([lat, lng], zoom);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([lat, lng]).addTo(map)
        .bindPopup(`
            <h2 class="mapa__heading">MeetPilot</h2>
            <p class="mapa__texto">Centro de Convenciones Palma de Mallorca</p>
        `)
        .openPopup();
}
