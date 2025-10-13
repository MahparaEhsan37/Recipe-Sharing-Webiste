// recipe catagory section
 const buttons = document.querySelectorAll('.filter-btn');
    const cards = document.querySelectorAll('.recipe-card');

    buttons.forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelector('.filter-btn.active').classList.remove('active');
        btn.classList.add('active');

        const category = btn.getAttribute('data-category');

        cards.forEach(card => {
          if (category === 'all') {
            card.classList.remove('hidden');
          } else {
            card.classList.toggle('hidden', !card.classList.contains(category));
          }
        });
      });
    });


    // subscribing section
     function handleSubscribe() {
      const email = document.getElementById('emailInput').value;
      const popup = document.getElementById('popup');

      // Simple email validation
      const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

      if (!isValid) {
        popup.textContent = "Email is not valid.";
      } else {
        popup.textContent = "Thank you for subscribing to our site!";
      }

      popup.style.display = "block";

      // Hide after 4 seconds (match animation)
      setTimeout(() => {
        popup.style.display = "none";
      }, 4000);
    }






// ✅ detail recipe
function getRecipeIdFromURL() {
  const params = new URLSearchParams(window.location.search);
  return parseInt(params.get("id"));
}

function renderRecipe(recipe) {
  const container = document.getElementById("recipe-container");

  if (!recipe) {
    container.innerHTML = "<h2>Recipe not found</h2>";
    return;
  }

  container.innerHTML = `
    <h1>${recipe.title}</h1>
    <div class="tags">
      <div class="tag time"><i class="fa-regular fa-clock"></i> ${recipe.time}</div>
      <div class="tag diet"><i class="fa-solid fa-seedling"></i> ${recipe.type}</div>
      <div class="tag rating"><i class="fa-solid fa-star"></i> ${recipe.rating}</div>
    </div>

    <div class="content-wrapper">
      <div class="recipe-img">
        <img src="${recipe.image}" alt="${recipe.title}">
      </div>
      <div class="ingredients">
        <h2>Ingredients</h2>
        <ul>
          ${recipe.ingredients.map(item => `<li>${item}</li>`).join("")}
        </ul>
      </div>
    </div>

    <div class="bottom-section">
      <div class="description">
        <h2>Description</h2>
        <p>${recipe.description}</p>
      </div>
      <div class="instructions">
        <h2>Instructions</h2>
        <ol>
          ${recipe.instructions.map(step => `<li>${step}</li>`).join("")}
        </ol>
      </div>
    </div>

    <div class="buttons">
      <button class="ask-btn"><i class="fa-regular fa-circle-question"></i> Ask for Cooking Tips</button>
      <button class="copy-btn"><i class="fa-regular fa-clipboard"></i> Copy Recipe</button>
    </div>
  `;
}

// ✅ Only run once DOM and recipes are fully loaded
document.addEventListener("DOMContentLoaded", () => {
  const recipeId = getRecipeIdFromURL();
  const recipe = recipes.find(r => r.id === recipeId);
  renderRecipe(recipe);
});
