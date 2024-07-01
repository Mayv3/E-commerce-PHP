function set_delete_events() {
  const buttons_arr = document.querySelectorAll(".delete-button");

  buttons_arr.forEach((button) =>
    button.addEventListener("click", function (event) {
      const id = event.target.id;
      render_confirm_modal(id);
    })
  );
}

function render_confirm_modal(id) {
  const { modal, modal_container } = generate_modal(
    "¿Estás seguro de que deseas eliminar el producto?"
  );

  const buttons_container = document.createElement("div");
  buttons_container.className = "d-flex gap-2";
  modal.appendChild(buttons_container);

  //modal confirm button and action
  const form = document.createElement("form");
  form.setAttribute("action", "/actions/deleteProduct.php");
  form.setAttribute("method", "POST");
  buttons_container.appendChild(form);

  const link_confirm = document.createElement("a");
  link_confirm.href = `./actions/deleteProduct.php?id=${id}`;
  link_confirm.textContent = "Confirmar";
  link_confirm.className = "btn button-confirm rounded p-2";
  form.appendChild(link_confirm);

  const button_cancel = document.createElement("button");
  button_cancel.textContent = "Cancelar";
  button_cancel.className = "btn btn-danger rounded p-2";
  button_cancel.addEventListener("click", function () {
    modal_container.remove();
  });
  buttons_container.appendChild(button_cancel);

  modal_container.appendChild(modal);
  document.body.appendChild(modal_container);
}

function generate_modal(text) {
  const modal_container = document.createElement("div");
  modal_container.classList.add("modal-container");

  const modal = document.createElement("div");
  modal.classList.add("modal-confirm");

  const modal_text = document.createElement("p");
  modal_text.textContent = text;
  modal_text.classList.add("text-dark");
  modal.appendChild(modal_text);

  return { modal, modal_container };
}

set_delete_events();
