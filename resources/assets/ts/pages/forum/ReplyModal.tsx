import React, { useState, useEffect } from "react";
import axios from "axios";
import ReactMde, { commands, Suggestion } from "react-mde";
import * as Showdown from "showdown";

import LoaderButton from "@/components/LoaderButton";
import { ReplyType, ThreadType, User } from "@/utils/types";
import Transition from "@/components/Transition";
import NotifyAlert from "@/components/NotifyAlert";

interface ReplyModalProps {
  isOpen: boolean;
  onClose: () => void;
  thread?: ThreadType;
  reply?: ReplyType;
}

export default ({
  isOpen,
  onClose,
  thread,
  reply,
}: ReplyModalProps) => {
  const [value, setValue] = useState("");
  const [selectedTab, setSelectedTab] = useState<"write" | "preview">("write");
  const [sending, setSending] = useState(false);
  const [message, setMessage] = useState("");
  const [notify, setNotify] = useState(false);

  useEffect(() => {
    if (reply) {
      setValue(reply.body);
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

  function loadSuggestions(text: string) {
    return new Promise<Suggestion[]>((accept) => {
      axios.get(`${thread?.path}/users`)
        .then((response) => {
          const { data } = response;
          const suggestions: Suggestion[] = [];

          // eslint-disable-next-line array-callback-return
          data.map((user: User) => {
            const suggestion = {
              preview: user.username,
              value: `@${user.username}`,
            };
            suggestions.push(suggestion);
          });

          // @ts-ignore
          suggestions.filter((i) => i.preview.toLowerCase().includes(text.toLowerCase()));
          accept(suggestions);
        })
        .catch((error) => {
          console.error(error);
        });
    });
  }

  function manageReply(e: React.SyntheticEvent) {
    e.preventDefault();
    setSending(true);

    if (reply) {
      axios.put(`/forum/threads/reply/${reply?.id}`, { body: value }).then((response) => {
        setSending(false);
        const { data } = response;
        if (data.status === 'success') {
          onClose();
          setValue("");
          setMessage(data.message);
          setNotify(true);
          setTimeout(() => {
            window.location.reload();
          }, 3000);
        }
      }).catch((error) => {
        const { errors } = error.response.data;
        if (errors) {
          setSending(false);
          setMessage("Impossible de modifier votre commentaire. Peut etre dû à un spam, recommencer plus tard.");
          setNotify(true);
        }
      });
    } else {
      axios.post(`/forum/threads/${thread?.slug}/replies`, { body: value }).then((response) => {
        setSending(false);
        const { data } = response;
        if (data.status === 'success') {
          onClose();
          setValue("");
          setMessage(data.message);
          setNotify(true);

          setTimeout(() => {
            window.location.reload();
          }, 3000);
        }
      }).catch((error) => {
        const { errors } = error.response.data;
        if (errors) {
          setSending(false);
          setMessage("Impossible de poster ce commentaire. Peut etre dû à un spam, recommencer plus tard.");
          setNotify(true);
        }
      });
    }
  }

  return (
    <>
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
              <form onSubmit={manageReply}>
                <div className="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                  <div className="flex items-center font-normal text-base">
                    <svg className="h-6 w-6 text-brand-200 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path
                        d="M3 10H13C17.4183 10 21 13.5817 21 18V20M3 10L9 16M3 10L9 4"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                      />
                    </svg>
                    {reply ? 'Modifier ma réponse' : 'Répondre à la conversation'}
                  </div>
                  <div className="mt-4">
                    <ReactMde
                      value={value}
                      onChange={setValue}
                      selectedTab={selectedTab}
                      onTabChange={setSelectedTab}
                      commands={listCommands}
                      generateMarkdownPreview={(markdown) => Promise.resolve(converter.makeHtml(markdown))}
                      textAreaProps={{ required: true }}
                      loadSuggestions={loadSuggestions}
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
                    <LoaderButton title={reply ? 'Modifier' : 'Commenter'} loading={sending} type="submit" />
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
      <NotifyAlert show={notify} onClose={() => setNotify(false)} message={message} />
    </>
  );
};
