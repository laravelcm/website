import React from "react";
import ReactDOM from "react-dom";

import QuillEditor from "@/components/QuillEditor";

const editor = document.getElementById('editor');
if (editor) {
  ReactDOM.render(<QuillEditor />, editor);
}
