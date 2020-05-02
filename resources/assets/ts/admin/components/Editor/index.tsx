import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import ReactMde, { commands } from "react-mde";
import * as Showdown from "showdown";

const editor = document.getElementById('editor');

const QuillEditor = () => {
  const [body, setBody] = useState('');
  const [selectedTab, setSelectedTab] = useState<"write" | "preview">("write");
  const converter = new Showdown.Converter({
    tables: true,
    simplifiedAutoLink: true,
    strikethrough: true,
    tasklists: true,
  });

  const listCommands = [
    {
      commands: [
        commands.linkCommand,
        commands.codeCommand,
        commands.imageCommand,
      ],
    },
  ];

  useEffect(() => {
    if (editor) {
      const content = editor.getAttribute('data-content');
      if (content) {
        setBody(content);
      }
    }
  }, []);

  return (
    <>
      <input type="hidden" value={body} name="body" />
      <ReactMde
        value={body}
        onChange={setBody}
        selectedTab={selectedTab}
        onTabChange={setSelectedTab}
        commands={listCommands}
        generateMarkdownPreview={(markdown) => Promise.resolve(converter.makeHtml(markdown))}
        textAreaProps={{ required: true, placeholder: "Rediger votre article ici..." }}
      />
      <p className="text-xs text-gray-500 font-italic font-light mt-3">
        * Vous pouvez utiliser du Markdown avec des blocs de code du{" "}
        <a
          href="https://help.github.com/en/github/writing-on-github/creating-and-highlighting-code-blocks"
          target="_blank"
          rel="noopener noreferrer"
          className="text-brand-primary"
        >
          style de GitHub.
        </a>
      </p>
    </>
  );
};

if (editor) {
  ReactDOM.render(<QuillEditor />, editor);
}
