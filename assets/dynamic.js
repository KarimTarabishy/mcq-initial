
/**
 * Created by Karim on 7/13/14.
 */

document.onclick =  function()
{
    var elem = document.getElementById("menu")
    if(!elem)
        return

    if( !hasClass(elem, "hidden"))
    {
        hideElement(elem)
        var t = document.getElementById("nav-user-focused")
        if(t)
        {
            t.id = "nav-user"
        }
    }
}
function createTime(container, name_prefix)
{
    var span = document.createElement("span")
    span.className ="time-span"

    var hour = document.createElement("select");
    hour.className = "time-select"
    hour.name=name_prefix + "[deadline][time][hour]"
    for(var i = 1; i <= 12; i++)
    {
        var option = document.createElement("option")
        option.innerHTML = i;
        option.value = i
        hour.add(option)
    }

    var minutes = document.createElement("select")
    minutes.className = "time-select"
    minutes.name=name_prefix + "[deadline][time][minute]"

    for(var i = 1; i <= 59; i++)
    {
        var option = document.createElement("option")
        option.innerHTML = i;
        option.value = i
        minutes.add(option)
    }

    var when = document.createElement("select")
    when.className = "time-select"
    when.name=name_prefix + "[deadline][time][when]"

    var option = document.createElement("option")
    option.innerHTML = "AM";
    option.value = "AM"
    when.add(option)

    option = document.createElement("option")
    option.innerHTML = "PM";
    option.value = "PM"
    when.add(option)


    span.appendChild(hour)
    span.innerHTML += " : "
    span.appendChild(minutes)
    span.appendChild(when)

    container.appendChild(span)
}


function menuDown(param, e)
{

    var elem = document.getElementById("menu");

    if( !hasClass(elem, "hidden"))
    {
        hideElement(elem)
        var t = document.getElementById("nav-user-focused")
        if(t)
        {
            t.id = "nav-user"
        }
    }
    else
    {
        if (!e) var e = window.event;
        param.id="nav-user-focused"
        showElement(elem)
        e.stopPropagation()
    }
}

function showElement(elem)
{
    removeClass(elem, "hidden")
}
function hideElement(elem)
{
    addClass(elem, "hidden")
}
function removeClass(elem, name)
{
    if(elem)
    {
        var regex = new RegExp("(?:^|\\s)" + name + "(?!\\S)");
        elem.className = elem.className.replace(regex, '')
    }
}
function addClass(elem, name)
{
    if(elem)
    {
        elem.className += " " + name
    }
}
function hasClass(elem, name)
{
    return arrayContains(String ( ( elem||{} ) .className )
        .split(/\s/), name)
}

function arrayContains(arr, elem)
{
    for(var i = 0; i < arr.length; i++)
    {
        if(elem == arr[i] )
            return true
    }
    return false
}
function checkValidChoices(choices)
{
    var isChecked = false

}

function onNewQuizSubmit(param)
{
    var cont = document.getElementsByName(param.value)

    var question = cont.getElementsByName("question")

    var number = param.value

    question.name = "questions[" + number + "][ques_string]"
}






var choice_index=2;
var questions = 1;
var edit_index = 1
function addChoice(param)
{

    var li = document.createElement('li');
    li.className = "choice"
    param.parentNode.parentNode.appendChild(li)


    choice = document.createElement('input');
    choice.setAttribute('type','radio');
    choice.setAttribute('name',"questions[" + questions + "][correct_ans]");
    choice.setAttribute('value',""+choice_index);
    li.appendChild(choice)

    txt = document.createElement("input");
    txt.setAttribute("type" , "text");
    txt.setAttribute("name","questions[" + questions + "][choices]["+(choice_index)+"]");
    txt.className = "form-control"
    txt.setAttribute("placeholder","Choice");
    li.appendChild(txt)
    li.appendChild(createDeleteButton())


    onAddRow(li.parentNode, li);
    choice_index += 1

}

function add(){
    save()
    questions += 1
    i = 2
    var container = document.createElement("div")
    container.id=""+questions
    container.className = "question-container"
    var qstr = document.createElement("div")
    qstr.className = "question-string"
    container.appendChild(qstr)

    var p = document.createElement("p")
    p.innerHTML = "Question"
    qstr.appendChild(p)
    var tarea = document.createElement("textarea")
    tarea.name = "questions["+questions+"][ques_string]"
    tarea.className = "form-control"
    qstr.appendChild(tarea)

    var table = document.createElement("ul")
    table.className = "choices-list"
    var li = document.createElement("li")
    li.className = "choice"
    var radio = document.createElement("input")
    radio.type="radio"
    radio.name="questions["+questions+"][correct_ans]"
    radio.value = "1"
    radio.className="form-control"
    li.appendChild(radio)
    var ti =document.createElement("input")
    ti.type="text"
    ti.className="form-control"

    ti.name="questions["+questions+"][choices][1]"
    li.appendChild(ti)
    table.appendChild(li)

     li = document.createElement("li")
    li.className = "choice"
     radio = document.createElement("input")
    radio.type="radio"
    radio.name="questions["+questions+"][correct_ans]"
    radio.value = "2"
    radio.className="form-control"
    li.appendChild(radio)
     ti =document.createElement("input")
    ti.type="text"
    ti.className="form-control"

    ti.name="questions["+questions+"][choices][2]"
    li.appendChild(ti)
    table.appendChild(li)

    container.appendChild(table)

    document.getElementById("form").appendChild(container)


    li.appendChild(document.getElementById("add-choice-but"))






}
function toggleDeleteButtons(hide,container){


    elementarray= container.getElementsByClassName('delete-button')
    for(i=0;i<elementarray.length;i++)
    {
        var del=elementarray[i];
        if (hide)
            hideElement(del)
        else
            showElement(del)
    }
}
function edit(param){

    var container = param.parentNode;

    var container = document.getElementByClassName("question-container")
    var textarea = questionStringContainer.lastChild ;
    textarea.readOnly = "false";


    var k= container.getElementByClassName('choices-list');
    elementarray= k.getElementByClassName('choice');
    for(i=0;i<elementarray.length;i++)
    {
        var radio = elementarray[i].firstChild;
        var text = radio.sibling;
        radio.disabled=false;
        text.readOnly=false;
        text.className+="text-readOnly";



    }
    var delbut =document.getElementByClassName("add-choice-but");
    delbut.style.display=none;

    if(elementarray.length>2)
        toggleDeleteButtons(false, k);




}

function deleteButton(param){


    table = param.parentNode.parentNode;
    var row = param.parentNode;
    onDeleteRow(table, row)
    table.removeChild(row)


}


function createEditButton()
{
    var editb = document.createElement("span")
    editb.className="edit-buttons"
    editb.onclick = function()
    {
        edit(this)
    }
    var i = document.createElement("i")
    i.className = "fa fa-pencil"
    editb.appendChild(i)
    return editb
}
function createDeleteButton()
{
    var editb = document.createElement("span")
    editb.className="edit-buttons delete-button"
    editb.onclick = function()
    {
        deleteButton(this)
    }
    var i = document.createElement("i")
    i.className = "fa fa-minus"
    editb.appendChild(i)
    return editb
}

function createAddButton()
{
    var editb = document.createElement("span")
    editb.className="edit-buttons"
    editb.id = "add-choice-but"
    editb.onclick = function()
    {
        addChoice(this)
    }
    var i = document.createElement("i")
    i.className = "fa fa-plus"
    editb.appendChild(i)
    return editb
}
function getEditButtonContainer(but)
{
    return but.parentNode.parentNode.parentNode
}
function onDeleteRow(table, row)
{
    var last = table.lastChild
    if(last == row)
    {
        var beforeLast = last.previousElementSibling
        beforeLast.appendChild(document.getElementById("add-choice-but"))
    }
    if(table.getElementsByClassName("delete-button").length <= 3)
        toggleDeleteButtons(true, table)

}
function onAddRow(table, row)
{
    var addButton = document.getElementById("add-choice-but")
    row.appendChild(addButton)
    toggleDeleteButtons(false, table)

}
function save()
{

    var container = document.getElementById(""+questions)
    var textarea = container.getElementsByTagName("textarea")[0]
    textarea.readOnly = "true";


    var k= container.getElementsByClassName('choices-list')[0];
    elementarray= k.getElementsByClassName('choice');
    for(i=0;i<elementarray.length;i++)
    {
        var radio = elementarray[i].children[0];
        var text = radio.nextSibling;
        radio.disabled=true;
        text.readOnly=true
    }

    toggleDeleteButtons(true,k);


    validate()

}

function validate()
{

}




