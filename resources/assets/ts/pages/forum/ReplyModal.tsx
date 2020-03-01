import React, { useState } from "react";
import axios from "axios";
import ReactMde, { commands } from "react-mde";
import * as Showdown from "showdown";
import {
  Modal,
  ModalOverlay,
  ModalContent,
  ModalHeader,
  ModalBody,
  ModalFooter,
  useToast,
} from "@chakra-ui/core";

import LoaderButton from "@/components/LoaderButton";

interface ReplyModalProps {
  isOpen: boolean;
  onClose: () => void;
  threadSlug?: string;
}

export default ({ isOpen, onClose, threadSlug }: ReplyModalProps) => {
  const [value, setValue] = useState("");
  const [selectedTab, setSelectedTab] = useState<"write" | "preview">("write");
  const [sending, setSending] = useState(false);
  const toast = useToast();

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

  function sendReply(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);

    axios.post(`/forum/threads/${threadSlug}/replies`, { body: value }).then((response) => {
      setSending(false);
      const { data } = response;
      if (data.status === 'success') {
        onClose();
        setValue("");
        toast({
          position: `bottom-right`,
          description: data.message,
          status: `success`,
          duration: 2000,
          isClosable: true,
        });

        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    }).catch((error) => {
      const { errors } = error.response.data;
      if (errors) {
        toast({
          position: `top`,
          title: `Attention.`,
          description: `Impossible de poster ce commentaire. Peut etre dû à un spam, recommencer plus tard.`,
          status: `error`,
          duration: 4000,
          isClosable: true,
        });
        setSending(false);
      }
    });
  }

  return (
    <Modal
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
        <form onSubmit={sendReply}>
          <ModalBody>
            <ReactMde
              value={value}
              onChange={setValue}
              selectedTab={selectedTab}
              onTabChange={setSelectedTab}
              commands={listCommands}
              generateMarkdownPreview={(markdown) => Promise.resolve(converter.makeHtml(markdown))}
              textAreaProps={{ required: true }}
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
          </ModalBody>
          <ModalFooter>
            <LoaderButton title="Commenter" loading={sending} type="submit" />
            <button className="px-4 py-2 rounded-md bg-red-100 border-2 border-red-400 text-red-600 hover:bg-red-700 hover:border-red-700 hover:text-white ml-3 transition-all" onClick={onClose}>Fermer</button>
          </ModalFooter>
        </form>
      </ModalContent>
    </Modal>
  );
};
