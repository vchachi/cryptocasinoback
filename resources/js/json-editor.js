import { JSONEditor } from "@json-editor/json-editor";

const options = {
    theme: "bootstrap4",
    iconlib: "fontawesome5",
    disable_edit_json: true,
    keep_oneof_values: false,
    disable_properties: true,
    // disable_collapse: true,
    array_controls_top: true,
    remove_button_labels: true,
    object_layout: "table",
};

JSONEditor.defaults.options = options;

window.JSONEditor = JSONEditor;
