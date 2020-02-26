import React, { useState } from "react";
import ReactMde, { commands } from "react-mde";
import * as Showdown from "showdown";
import {
  Modal,
  ModalOverlay,
  ModalContent,
  ModalHeader,
  ModalBody,
  ModalFooter,
} from "@chakra-ui/core";

export default ({ isOpen, onClose }: { isOpen: boolean; onClose: () => void }) => {
  const [value, setValue] = useState("");
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

  return (
    <Modal
      blockScrollOnMount={false}
      isOpen={isOpen}
      onClose={onClose}
      isCentered
      size="3xl"
    >
      <ModalOverlay />
      <ModalContent className="rounded-md">
        <ModalHeader className="flex items-center font-normal text-base">
          <svg className="h-6 w-6 text-brand-200 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path
              d="M3 10H13C17.4183 10 21 13.5817 21 18V20M3 10L9 16M3 10L9 4"
              strokeLinecap="round"
              strokeLinejoin="round"
              strokeWidth="2"
            />
          </svg>
          Répondre à la conversation
        </ModalHeader>
        <ModalBody>
          <ReactMde
            value={value}
            onChange={setValue}
            selectedTab={selectedTab}
            onTabChange={setSelectedTab}
            commands={listCommands}
            generateMarkdownPreview={(markdown) => Promise.resolve(converter.makeHtml(markdown))}
          />
          <p className="text-xs text-gray-500 font-italic font-light mt-3">
            * Vous pouvez utiliser du Markdown avec des blocs de code du style de{" "}
            <a
              href="https://help.github.com/en/github/writing-on-github/creating-and-highlighting-code-blocks"
              target="_blank"
              rel="noopener noreferrer"
              className="text-brand-primary"
            >
              GitHub.
            </a>
          </p>
        </ModalBody>
        <ModalFooter>
          <button className="btn btn-primary">Commenter</button>
          <button className="px-4 py-2 rounded-md bg-red-100 border-2 border-red-400 text-red-600 hover:bg-red-700 hover:border-red-700 hover:text-white ml-3 transition-all" onClick={onClose}>Fermer</button>
        </ModalFooter>
      </ModalContent>
    </Modal>
  );
};
