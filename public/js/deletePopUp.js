const crossButton = document.querySelectorAll('.cross-button');
const deleteCategoryForm = document.querySelector('.confirm-delete-form');

if (localStorage.getItem('deletePopUp') == null) {
  localStorage.setItem('deletePopUp', 'false');
} else if (localStorage.getItem('deletePopUp') == 'true') {
  deleteCategoryForm.classList.remove('hidden');
  deleteCategoryForm.classList.add('flex');
}

crossButton.forEach((button) => {
  button.addEventListener('click', (_) => {
    deleteCategoryForm.classList.add('flex');
    deleteCategoryForm.classList.remove('hidden');
    localStorage.setItem('deletePopUp', 'true');
  });
});

const yesButton = document.querySelector('.confirm-delete');
const noButton = document.querySelector('.no-button');

yesButton.addEventListener('click', (_) => {
  deleteCategoryForm.classList.add('hidden');
  deleteCategoryForm.classList.remove('flex');
  localStorage.setItem('deletePopUp', 'false');
});

noButton.addEventListener('click', (_) => {
  deleteCategoryForm.classList.add('hidden');
  deleteCategoryForm.classList.remove('flex');
  localStorage.setItem('deletePopUp', 'false');
});
