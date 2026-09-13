
function attachTableSearch(searchInputId, tableId) {
  const input = document.getElementById(searchInputId);
  const table = document.getElementById(tableId);
  if (!input || !table) return;

  input.addEventListener('input', () => {
    const query = input.value.trim().toLowerCase();
    const rows = table.querySelectorAll('tbody tr');

    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(query) ? '' : 'none';
    });
  });
}

.
function attachConfirmForms() {
  document.querySelectorAll('form.confirm-form').forEach(form => {
    form.addEventListener('submit', (e) => {
      const message = form.dataset.confirm || 'Are you sure?';
      if (!confirm(message)) {
        e.preventDefault();
      }
    });
  });
}


function attachRemovePostModal() {
  const modal   = document.getElementById('removeModal');
  const idField = document.getElementById('removeModalId');
  const label   = document.getElementById('removeModalLabel');
  const cancel  = document.getElementById('removeModalCancel');
  if (!modal) return;

  document.querySelectorAll('.open-remove-modal').forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      idField.value = link.dataset.id;
      label.textContent = link.dataset.label;
      modal.style.display = 'flex';
    });
  });

  if (cancel) {
    cancel.addEventListener('click', () => {
      modal.style.display = 'none';
    });
  }

  modal.addEventListener('click', (e) => {
    if (e.target === modal) modal.style.display = 'none';
  });
}

function attachReplyToggles() {
  document.querySelectorAll('.toggle-reply').forEach(btn => {
    btn.addEventListener('click', () => {
      const row = document.getElementById(btn.dataset.target);
      if (!row) return;
      row.style.display = row.style.display === 'none' ? 'table-row' : 'none';
    });
  });
}
