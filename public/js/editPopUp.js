const gearButton = document.querySelectorAll('.gear-button');
const editItemForm = document.querySelector('.edit-item');

if (localStorage.getItem('editPopUp') == null) {
  localStorage.setItem('editPopUp', 'false');
} else if (localStorage.getItem('editPopUp') == 'true') {
  editItemForm.classList.remove('hidden');
  editItemForm.classList.add('flex');
}

gearButton.forEach((button) => {
  button.addEventListener('click', (_) => {
    editItemForm.classList.remove('hidden');
    editItemForm.classList.add('flex');
    localStorage.setItem('editPopUp', 'true');
  });
});

const saveButton = document.querySelector('.confirm-save');

saveButton.addEventListener('click', (_) => {
  editItemForm.classList.add('hidden');
  editItemForm.classList.remove('flex');
  localStorage.setItem('editPopUp', 'false');
});
