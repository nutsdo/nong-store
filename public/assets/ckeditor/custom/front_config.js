/**
 * Created by lvdingtao on 2017/1/9.
 */
CKEDITOR.editorConfig = function( config ) {
    config.toolbarGroups = [
        { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
        { name: 'styles', groups: [ 'styles' ] },
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
        { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
        { name: 'links', groups: [ 'links' ] },
        { name: 'insert', groups: [ 'insert' ] },
        { name: 'forms', groups: [ 'forms' ] },
        { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
        { name: 'others', groups: [ 'others' ] },
        { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
        { name: 'tools', groups: [ 'tools' ] },
        { name: 'colors', groups: [ 'colors' ] },
        { name: 'about', groups: [ 'about' ] }
    ];

    config.removeButtons = 'Underline,Subscript,Superscript,Cut,Copy,Paste,PasteText,PasteFromWord,About,Styles,Outdent,Indent,Strike,Source,Table,HorizontalRule,SpecialChar,Anchor,Scayt';

    // Set the most common block elements.
    config.format_tags = 'p;h1;h2;h3;pre';

    // Simplify the dialog windows.
    config.removeDialogTabs = 'image:advanced;image:Link;link:advanced'; //image:info;

    // BootstrapCK Skin Options
    config.skin = 'bootstrapck';
    config.height = '350px';
};