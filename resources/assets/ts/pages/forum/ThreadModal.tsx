import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";
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

import { ChannelType } from "@/utils/types";
import LoaderButton from "@/components/LoaderButton";
import TextInput from "@/components/TextInput";
import SelectInput from "@/components/SelectInput";

interface ReplyModalProps {
  isOpen: boolean;
  onClose: () => void;
}

export default ({ isOpen, onClose }: ReplyModalProps) => {
  const { auth, errors, channels } = usePage();
  const { user } = auth;
  const [body, setBody] = useState("");
  const [selectedTab, setSelectedTab] = useState<"write" | "preview">("write");
  const [sending, setSending] = useState(false);
  const [values, setValues] = useState({
    title: "",
    channel_id: "",
  });

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

  function handleChange(e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) {
    const { name, value } = e.target;

    // eslint-disable-next-line no-shadow
    setValues((values) => ({
      ...values,
      [name]: value,
    }));
  }

  function createThread(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);

    const form = {
      ...values,
      body,
    };

    Inertia.post(`/forum/threads`, form).then(() => {
      setSending(false);
    }).catch((error) => {
      console.error(error);
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
        <ModalHeader className="flex items-center justify-between font-normal text-base">
          <div className="flex items-center">
            <img src={user.picture} alt={user.full_name} className="h-10 w-10 rounded-full mr-4" />
            <small>@{user.username}</small>
          </div>
          <SelectInput
            onChange={handleChange}
            value={values.channel_id}
            name="channel_id"
            errors={errors.channel_id}
          >
            <option value="">Selectionner un channel</option>
            {
              channels.map((channel: ChannelType) => (
                <option key={channel.id} value={channel.id}>
                  {channel.name}
                </option>
              ))
            }
          </SelectInput>
        </ModalHeader>
        <form onSubmit={createThread}>
          <ModalBody>
            <TextInput
              name="title"
              type="text"
              errors={errors.title}
              value={values.title}
              onChange={handleChange}
              placeholder="Titre du sujet"
            />
            <ReactMde
              value={body}
              onChange={setBody}
              selectedTab={selectedTab}
              onTabChange={setSelectedTab}
              commands={listCommands}
              generateMarkdownPreview={(markdown) => Promise.resolve(converter.makeHtml(markdown))}
              textAreaProps={{ required: true, placeholder: "Détaillez votre problème ici..." }}
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
            <LoaderButton title="Poster" loading={sending} type="submit" />
            <button className="px-4 py-2 rounded-md bg-red-100 border-2 border-red-400 text-red-600 hover:bg-red-700 hover:border-red-700 hover:text-white ml-3 transition-all" onClick={onClose}>Fermer</button>
          </ModalFooter>
        </form>
      </ModalContent>
    </Modal>
  );
};
