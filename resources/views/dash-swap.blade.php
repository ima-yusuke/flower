<x-app-layout>
    <div id="image-container">
        <div id="image-container">
            <img id="image1" class="image" src="{{asset('img/flower01.jpg')}}" alt="Static Image">
            <img id="image2" class="image" src="{{asset('img/flower02.jpeg')}}" alt="Animation">
        </div>
    </div>
    <button id="swap-button">Swap Images</button>

    <script>
        document.getElementById('swap-button').addEventListener('click', function() {
            const image1 = document.getElementById('image1');
            const image2 = document.getElementById('image2');

            // Apply zoom in and zoom out effects with translation
            image1.classList.add('image1-zoom-in');
            image2.classList.add('image2-zoom-out');

            // Wait for the animations to complete
            setTimeout(() => {
                // Swap the images in the DOM
                const container = document.getElementById('image-container');
                container.insertBefore(image2, image1);

                // Remove zoom effects immediately after swapping
                image1.classList.add('swapped');
                image2.classList.add('swapped');
                image1.classList.remove('image1-zoom-in');
                image2.classList.remove('image2-zoom-out');

                // Force a reflow to apply the immediate changes
                void image1.offsetWidth;
                void image2.offsetWidth;

                // Remove the swapped class to re-enable transitions
                image1.classList.remove('swapped');
                image2.classList.remove('swapped');
            }, 500); // Match this duration to the CSS transition duration
        });


    </script>
</x-app-layout>
