<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Revenue
    </h4>
    <canvas id="pie"></canvas>
    <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
        <!-- Chart legend -->
        <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-blue-500 rounded-full"></span>
            <span>Shirts</span>
        </div>
        <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-teal-600 rounded-full"></span>
            <span>Shoes</span>
        </div>
        <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
            <span>Bags</span>
        </div>
    </div>
</div>
<script>
    const Revenue = document.getElementById('pie');
    document.addEventListener('livewire:navigated', () => {

        new Chart(Revenue, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
