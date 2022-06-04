const dropdownBtns = document.querySelectorAll("#dropdownBtn")
const bookSctn = document.getElementById("book");
const dvdSctn = document.getElementById("dvd");
const furnitureSctn = document.getElementById("furniture")
const options = document.getElementById("attributes");
const switcher = document.getElementById("switcher")




const sections = {
    book: bookSctn,
    dvd: dvdSctn,
    furniture: furnitureSctn
}

const optionsArr = Array.from(options.children)

for (let i = 0; i < optionsArr.length; i++) {
    options.removeChild(optionsArr[i])
}

for (let i = 0; i < dropdownBtns.length; i++) {
    alert("here!!");
    dropdownBtns[i].addEventListener("click", (e) => showOption(e.target))
}
let switchVal = null

switcher.addEventListener("change", (e) => {
    alert("hi", e.target.value)
    switchVal = e.target.value
})

const showOption = (target) => {
    const d = target.parentElement.value
    console.log({d})
    options.replaceChildren(sections[d])
}

$('#saveButton').click(function(){
       
    const sku = $("#sku").val();
    const name = $("#name").val();
    const price = $("#price").val();
    const switcher = $("#switcher").val();
    const attributes = $("#attributes").val();

    const data =  {
        sku, name,price, switcher, options, attributes
    }
    console.log({data})
//  $('#product_form').submit();
});