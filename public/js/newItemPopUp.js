const addItemButton = document.querySelector('.add-item-button');
const newItemForm = document.querySelector('.new-item-form');

addItemButton.addEventListener('click', (_) => {
  newItemForm.classList.remove('hidden');
  newItemForm.classList.add('flex');
});

const cancelButton = document.querySelector('.cancel-button');
cancelButton.addEventListener('click', (_) => {
  newItemForm.classList.add('hidden');
  newItemForm.classList.remove('flex');
});

const confirmAdd = document.querySelector('.confirm-add');
