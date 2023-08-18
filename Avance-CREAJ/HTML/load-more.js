
const loadMoreButton = document.getElementById('load-more');
const blogContainer = document.getElementById('blog-container');
const blogsPerPage = 3; // Cambia este valor según tus necesidades
let currentPage = 1;

loadMoreButton.addEventListener('click', () => {
    currentPage++;
    loadBlogs();
});

function loadBlogs() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `get-blogs.php?page=${currentPage}`, true);

    xhr.onload = () => {
        if (xhr.status === 200) {
            const newBlogs = JSON.parse(xhr.responseText);
            if (newBlogs.length > 0) {
                newBlogs.forEach((blog) => {
                    const blogDiv = document.createElement('div');
                    blogDiv.className = 'bg-white p-6 rounded-md shadow-lg hover:shadow-xl transition duration-300 flex flex-col justify-between';
                    blogDiv.innerHTML = `
                        <div>
                            <img src="${blog.imagen}" alt="Imagen del artículo" class="mb-4 rounded-md">
                            <h2 class="text-xl font-semibold mb-2 text-indigo-600 text-center">${blog.titulo}</h2>
                            <p class="text-gray-700 mb-4">${blog.contenido}</p>
                        </div>
                        <button class="read-more text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 text-center">Leer más</button>
                    `;
                    blogContainer.appendChild(blogDiv);
                });
            } else {
                loadMoreButton.style.display = 'none';
            }
        }
    };

    xhr.send();
}