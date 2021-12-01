// $('.btn-add-image').each(function() {
//     let form = this.parentElement.querySelector('.form-add-image');
//     let btn = this;
//     btn.onclick = ()=>{
//         form.classList.toggle('d-none');
//     }
// })

let btn_add_section = document.querySelector('.btn-add-section');
let form_add_section = document.querySelector('.form-add-section')
btn_add_section.onclick = ()=>{
    form_add_section.classList.toggle('d-none');
}