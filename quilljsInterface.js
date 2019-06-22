//alert("quilljs interfacing js file loaded");
var fulltoolbar = [
    ["bold", "italic", "underline", "strike"], // toggled buttons
    ["blockquote", "code-block"],

    [{
            header: 1
        },
        {
            header: 2
        }
    ], // custom button values
    [{
            list: "ordered"
        },
        {
            list: "bullet"
        }
    ],
    [{
            script: "sub"
        },
        {
            script: "super"
        }
    ], // superscript/subscript
    [{
            indent: "-1"
        },
        {
            indent: "+1"
        }
    ], // outdent/indent
    [{
        direction: "rtl"
    }], // text direction

    [{
        size: ["small", false, "large", "huge"]
    }], // custom dropdown
    [{
        header: [1, 2, 3, 4, 5, 6, false]
    }],
    ["link", "image", "video", "formula"], // add's image support
    [{
            color: []
        },
        {
            background: []
        }
    ], // dropdown with defaults from theme
    [{
        font: []
    }],
    [{
        align: []
    }],

    ["clean"] // remove formatting button
];

var lesstoolbar = [
    ["bold", "italic", "underline", "strike"], // toggled buttons
    ["image", "video", "formula"], // add's image support
    // dropdown with defaults from theme
    [{
        font: []
    }],
    [{
        align: []
    }],

    ["clean"] // remove formatting button
];

var fullEditorOptions = {
    modules: {
        toolbar: fulltoolbar
    },
    placeholder: "Write description here...",
    theme: "snow"
};

var lessEditorOptions = {
    modules: {
        toolbar: lesstoolbar
    },

    theme: "snow"
};

function makeEditor(mydiv, myoptions) {
    var newEditor = new Quill(mydiv, myoptions);
}