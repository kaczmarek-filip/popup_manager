// TODO: Trzeba zrobić to że jak się wybiera kolorek to wskakuje HEX w input

const input = document.getElementById('selectors_input');
const selectors_list = document.getElementById('selectors_list');

selectors = ""

input.addEventListener('keyup', function(event) {


if (event.key === 'Enter') {
    const value = input.value;
    if (value.trim() !== '') {
    const classes = value.split(' ')

    // selectors += " "+value


    classes.forEach(class_one => {

        if (class_one[0] != "."){
            // console.log(class_one[0])
            class_one = "." + class_one
            // console.log(class_one[0])
        }
        const block = document.createElement('div');
        block.classList.add('selectors_list_record');
        block.textContent = class_one;
        // block.setAttribute("name", "selectors")
        selectors_list.appendChild(block);
        input.value = '';

        selectors += ""+class_one

        // const close_block = document.createElement('div')
        // close_block.classList.add('selectors_list_record_close');
        // close_block.innerHTML = '<span class="dashicons dashicons-no-alt"></span>'
        // block.appendChild(close_block)

        // close_block.addEventListener("click", () => {
        //     block.remove()
        //     // selectors -= class_one
        // })
    });

    console.log(selectors)

    const selector_output = document.createElement('input');
    selector_output.setAttribute("name", "selectors")
    selector_output.style.visibility = "hidden"
    selector_output.style.display = "none"
    selectors_list.appendChild(selector_output);
    // selector_output.textContent = selectors
    selector_output.value = selectors


    }

}
});

function background_color_input()
{
    background_color = document.getElementById("background_color")
    background_color_rgb = document.getElementById("background_color_rgb")

    background_color_rgb.addEventListener("blur", () => {
        background_color.value = background_color_rgb.value
    })
}
background_color_input()

function text_color_input()
{
    text_color = document.getElementById("text_color")
    text_color_rgb = document.getElementById("text_color_rgb")

    text_color_rgb.addEventListener("blur", () => {
        text_color.value = text_color_rgb.value
    })
}
text_color_input()

class Values_input
{
    constructor(input_value_name, input_type, output_parent){
        this.input_value_name = input_value_name
        this.input_value = document.getElementById(input_value_name)
        this.input_type = document.getElementById(input_type)
        this.output_parent = output_parent

        this.input_value.addEventListener("blur", () => {
            this.updateOutput()
        })
        this.input_type.addEventListener("blur", () => {
            this.updateOutput()
        })
    }

    updateOutput(){

            const output = document.createElement('input')
            output.setAttribute("name", this.input_value_name)
            // output.style.visibility = "hidden"
            this.output_parent.appendChild(output)
            output.style.display = "none"
            output.value = this.input_value.value + this.input_type.value
            console.log(output.value)

            if(this.input_type.value == "fit")
            {
                output.value = "fit-content"
            }
    }
}

const width_class = new Values_input("width", "width_select", selectors_list)
const height_class = new Values_input("height", "height_select", selectors_list)
const padding_class = new Values_input("padding", "padding_select", selectors_list)




function usunRekord(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        // Wywołaj skrypt PHP w celu usunięcia rekordu
        window.location.href = "delete.php?id=" + id;
    }
}
