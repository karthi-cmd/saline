function form_check(source)
{
    var checkboxes = document.getElementsByName('form-check-input');
  for(var i=0, n=checkboxes.length;i<n;i++) 
  {
    checkboxes[i].checked = source.checked;
  }
}

function todo(source)
{
  var checkboxes = document.getElementsByName('todo-input');
  for(var i=0, n=checkboxes.length;i<n;i++)
  {
    checkboxes[i].checked = source.checked;
  }
}