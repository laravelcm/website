import React, { useState, useEffect } from "react";
import { Inertia } from "@inertiajs/inertia";
import { usePage } from "@inertiajs/inertia-react";
import ReactMde, { commands } from "react-mde";
import * as Showdown from "showdown";

import { ChannelType, ThreadType } from "@/utils/types";
import LoaderButton from "@/components/LoaderButton";
import TextInput from "@/components/TextInput";
import SelectInput from "@/components/SelectInput";
import Transition from "@/components/Transition";

interface ReplyModalProps {
  thread?: ThreadType;
  isOpen: boolean;
  onClose: () => void;
}

export default ({ thread, isOpen, onClose }: ReplyModalProps) => {
  const { auth, errors, channels } = usePage();
  const { user } = auth;
  const [body, setBody] = useState("");
  const [id, setId] = useState<null | number>(null);
  const [selectedTab, setSelectedTab] = useState<"write" | "preview">("write");
  const [sending, setSending] = useState(false);
  const [values, setValues] = useState({
    title: "",
    channel_id: "",
  });

  useEffect(() => {
    if (thread) {
      setBody(thread.body);
      setId(thread.id);
      // eslint-disable-next-line no-shadow
      setValues((values) => ({
        ...values,
        title: thread.title,
      }));
    }
  }, []);

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

  function manageThread(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);

    const form = {
      ...values,
      body,
    };

    if (thread) {
      Inertia.put(`/forum/threads/${id}`, form).then(() => {
        setSending(false);
        onClose();
        window.location.reload();
      }).catch((error) => {
        console.error(error);
      });
    } else {
      Inertia.post(`/forum/threads`, form).then(() => {
        setSending(false);
      }).catch((error) => {
        console.error(error);
      });
    }
  }

  return (
    <Transition show={isOpen}>
      <div className="fixed z-100 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
        <Transition
          enter="ease-out duration-300"
          enterFrom="opacity-0"
          enterTo="opacity-100"
          leave="ease-in duration-200"
          leaveFrom="opacity-100"
          leaveTo="opacity-0"
        >
          <div className="fixed inset-0 transition-opacity">
            <div className="absolute z-100 inset-0 bg-gray-800 opacity-75" />
          </div>
        </Transition>

        <Transition
          enter="ease-out duration-300"
          enterFrom="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          enterTo="opacity-100 translate-y-0 sm:scale-100"
          leave="ease-in duration-200"
          leaveFrom="opacity-100 translate-y-0 sm:scale-100"
          leaveTo="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
          <div className="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-3xl sm:w-full">
            <form onSubmit={manageThread}>
              <div className="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div className="flex items-center justify-between font-normal text-base">
                  <div className="flex items-center">
                    <img src={user.picture} alt={user.full_name} className="h-10 w-10 rounded-full" />
                    <small className="text-sm font-medium ml-3">@{user.username}</small>
                  </div>
                  {!thread && (
                    <SelectInput
                      onChange={handleChange}
                      value={values.channel_id}
                      name="channel_id"
                      errors={errors.channel_id}
                    >
                      {
                        channels.map((channel: ChannelType) => (
                          <option key={channel.id} value={channel.id}>
                            {channel.name}
                          </option>
                        ))
                      }
                    </SelectInput>
                  )}
                </div>
                <div className="mt-4">
                  <TextInput
                    name="title"
                    type="text"
                    errors={errors.title}
                    value={values.title}
                    onChange={handleChange}
                    placeholder="Titre de votre sujet"
                    autoComplete="off"
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
                </div>
              </div>
              <div className="bg-gray-50 p-4 sm:px-6 sm:py-4 sm:flex sm:flex-row-reverse">
                <span className="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                  <LoaderButton title={thread !== null ? 'Modifier' : 'Poster'} loading={sending} type="submit" />
                </span>
                <span className="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                  <button onClick={onClose} type="button" className="btn-white">
                    Fermer
                  </button>
                </span>
              </div>
            </form>
          </div>
        </Transition>
      </div>
    </Transition>
  );
};
