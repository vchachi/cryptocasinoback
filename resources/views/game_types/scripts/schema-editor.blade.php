<script defer>

document.addEventListener("DOMContentLoaded", (event) => {
    const element = document.getElementById('schema-editor');
    const startval1 = @if ($gameType ?? false) {!! $gameType->schema ?: '{}' !!} @else {} @endif;
    //const startval = { "settings": [ { "name": "interval", "type": "integer", "default": 5, "required": false }, { "name": "range", "type": "sting", "default": "[0,5]", "required": true }, { "name": "odds", "type": "sting", "default": "{ \"0.5\": 60, \"2\": 25, \"2.5\": 10, \"5\": 5 }", "required": true }, { "name": "max", "type": "number", "default": 2.3, "required": true } ] };
    const startval = [ { "name": "interval", "type": "integer", "default": 5, "required": false }, { "name": "range", "type": "sting", "default": "[0,5]", "required": true }, { "name": "odds", "type": "sting", "default": "{ \"0.5\": 60, \"2\": 25, \"2.5\": 10, \"5\": 5 }", "required": true }, { "name": "max", "type": "number", "default": 2.3, "required": true } ];
    const options = {
        compact: true,
        schema: {
            type: "array",
            title: "Schema: ",
            items: {
                type: "object",
                properties: {
                    name: { type: "string" },
                    type: { type: "string", enum: [ "string", "boolean", "integer", "number" ] }, //, "array", "object" ] }, //, "date", "time", "range", "email" ] },
                    default: { type: "string" },
                    // IF format: { type: "string", enum: [ "text", "checkbox" ] },
                    required: { type: "boolean", default: true },
                    //options: { type: "array" },
                },
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
            }
        },
        startval
    };

    const editor = new JSONEditor(element, options);
    editor.on('change', () => {
        const schema = editor.getValue();
        document.getElementById('schema').value = JSON.stringify(schema).replaceAll('\\"', "'"); //.replace(/[^\w\s]/gi, '');

        console.log(document.getElementById('schema').value)
    });
});

</script>