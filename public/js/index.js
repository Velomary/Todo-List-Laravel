const addbutton = document.querySelector('.add_button')
var input_value = document.querySelector('.input')
const container = document.querySelector('.content')

class item{
    constructor(itemName){
        this.createDiv(itemName)
    }
    createDiv(itemName){
        let input = document.createElement('input')
        input.value = itemName
        input.disabled = true
        input.classList.add('item_input')
        input.type = Text

        let itembox = document.createElement('div')
        itembox.classList.add('item')

        let editbutton = document.createElement('a')
        editbutton.classList.add('Edit_button')
        editbutton.innerHTML = '<i class="fas fa-pen" ></i>'

        let removebutton = document.createElement('a')
        removebutton.classList.add('remove_button')
        removebutton.innerHTML = ('<i class="fas fa-trash-alt" ></i>')

        let point = document.createElement('a')
        point.classList.add('point')
        point.innerHTML = '<i class="fas fa-circle"></i>'+' '
        point.addEventListener('click',function(){
            point.innerHTML = '<i class="fas fa-check-circle" ></i>'+' '
            input.style.textDecoration =  'line-through'
        })

        container.appendChild(itembox)
        itembox.appendChild(point)
        itembox.appendChild(input)
        itembox.appendChild(editbutton)
        itembox.appendChild(removebutton)

        editbutton.addEventListener('click',()=> this.edit(input))
        removebutton.addEventListener('click',()=> this.remove(itembox))
    }
    edit(input){
        input.disabled = !input.disabled
        input.classList.toggle('active')
    }
    remove(itembox){
        container.removeChild(itembox)
    }
}


function chek(){
    if(input_value.value == ''){
        alert('Write somthing please!')
    }
    else {
        new item(input_value.value)
        input_value.value = ''
    }
}
addbutton.addEventListener('click',chek)
window.addEventListener('keydown', (e)=>{
    if(e.which == 13){
        chek()
    }
})

