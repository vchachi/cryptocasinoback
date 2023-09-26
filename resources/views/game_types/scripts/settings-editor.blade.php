<script defer>

document.addEventListener("DOMContentLoaded", (event) => {
    const element = document.getElementById('settings-editor');
    const schema = @if ($gameType ?? false) {!! $gameType->schema ?: '{}' !!} @else {} @endif;
    const startval = @if ($gameType ?? false) {!! $gameType->settings ?: '{}' !!} @else {} @endif;
    //const startval = { "max": "5", "odds": { "2": 25, "5": 5, "0.5": 60, "2.5": 10 }, "range": "[0,5]", "interval": "5" };
    const properties = {};

    for (const [index, setting] of Object.entries(schema.settings)) {
        properties[setting.name] = { type: setting.type }; //, default: setting.default, required: setting.required };
    }

    console.log(properties);

    const options = {
        compact: true,
        //form_name_root: 'Settings1',
        schema: { 
            type: "object",
            title: "Settings2",
            properties,
            if: { properties: { type: { const: "integer" } } }, then: {
                properties: { default: { format: "number" } }
            },
            if: { properties: { type: { const: "boolean" } } }, then: {
                properties: { default: { format: "checkbox" } }
            },
            /*if: { properties: { type: { const: "array" } } }, then: {
                properties: { default: { format: "table" } }
            },
            if: { properties: { type: { const: "object" } } }, then: {
                properties: { default: { format: "grid" } }
            }*/
        },
        disable_collapse: true,
        required_by_default: true,
        no_additional_properties: true,
        disable_array_delete_all_rows: true,
        disable_array_delete_last_row: true,
        startval
    };

    const editor = new JSONEditor(element, options);
    editor.on('change', () => {
        const settings = editor.getValue();
        document.getElementById('settings').value = JSON.stringify(settings).replaceAll('\\"', "'"); //.replace(/[^\w\s]/gi, '');

        console.log(document.getElementById('settings').value)
    });
});

</script>