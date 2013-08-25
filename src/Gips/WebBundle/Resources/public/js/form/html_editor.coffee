setupEditor = ($editorDiv) ->

  editorID = $editorDiv.attr('id')
  inputID = editorID.slice(0, editorID.length - 7)
  editor = ace.edit(editorID)

  $editorDiv.css('fontSize', '14px')
  editor.getSession().setUseWorker(false);
  editor.setTheme("ace/theme/idle_fingers")
  editor.getSession().setTabSize(4)
  editor.getSession().setUseSoftTabs(true)
  editor.getSession().on('change', (e) ->
    $( "#"+inputID ).val( editor.getSession().getDocument().getAllLines().join('\n') )
  )

editors = $('.ace-editor')
if editors.length
  editors.each () ->
    setupEditor( $(this) )