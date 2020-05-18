import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import ReactMarkdown from "react-markdown";
import classNames from "classnames";

import { timeAgo } from "@/utils/helpers";
import { ReplyType } from "@/utils/types";
import DeleteModal from "@/components/DeleteModal";
import ReplyModal from "@/pages/forum/ReplyModal";

interface ReplyProps {
  reply: ReplyType;
}

const Reply = ({ reply }: ReplyProps) => {
  const {
    id,
    body,
    owner,
    isBest,
    local_created_at,
  } = reply;
  const { auth } = usePage();
  const { user } = auth;
  const [show, setShow] = useState(false);
  const [open, setOpen] = useState(false);
  const className = classNames(
    `flex flex-col px-6 py-4 rounded-lg mb-2 group`,
    {
      'bg-brand-100': isBest,
      'hover:bg-gray-100': !isBest,
    },
  );
  const message = (user !== null && user.id === owner.id)
    ? `Voulez-vous vraiment supprimer votre réponse? Vous ne trouvez plus ce commentaire dans votre historique.`
    : (<>Voulez-vous vraiment supprimer la reponse de <span className="text-gray-800 font-medium">{owner.username}</span>? Ce commentaire ne sera plus lister dans le thread.</>);

  function markBestReply(e: React.SyntheticEvent, replyId: number) {
    e.preventDefault();
    Inertia.post(`/forum/threads/replies/${replyId}/best`);
  }

  return (
    <>
      <div id={`reply-${id}`} className={className}>
        <div className="flex items-center justify-between">
          <div className="flex items-center">
            <div className="mr-4 text-center">
              <InertiaLink
                href={`/u/@${owner.username}`}
                className="h-10 w-10 flex flex-shrink-0"
              >
                <img
                  className="rounded-full h-full w-full object-cover"
                  src={owner.picture}
                  alt={owner.full_name}
                />
              </InertiaLink>
            </div>
            <p>
              <span className={`font-medium ${owner.is_admin ? 'text-brand-primary' : 'text-gray-800'}`}>@{owner.username}</span>
              <span className="text-gray-500 text-sm ml-2 hidden md:inline-flex">{timeAgo(local_created_at)}</span>
            </p>
          </div>
          <div className="flex items-center">
            {
              ((user && user.id === reply.thread.creator.id) && !isBest) && (
                <button className="btn-white rounded-full items-center" type="button" onClick={(e) => markBestReply(e, reply.id)}>
                  <svg className="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M5 13l4 4L19 7" />
                  </svg>
                  Meilleure réponse
                </button>
              )
            }
            {
              (isBest) && (
                <span className="text-xs text-center py-2 px-3 rounded-full bg-opacity-primary text-brand-primary md:text-sm">
                  Meilleure réponse
                </span>
              )
            }
          </div>
        </div>
        <div className="mt-4">
          <div className="content-body text-gray-800 text-sm md:text-base">
            <ReactMarkdown
              source={body}
              escapeHtml={false}
              renderers={{
                Link: (props) => {
                  const { href, children } = props;
                  return <a href={href}>{children}</a>;
                },
              }}
              skipHtml
            />
          </div>
          {
            (user !== null && user.id === owner.id) && (
              <div className="flex space-x-10 mt-4">
                {user.id === owner.id && (
                  <div className="flow-root">
                    <button
                      type="button"
                      onClick={() => setOpen(true)}
                      className="-m-2 px-2 py-1 space-x-2 flex items-center rounded-md text-xs font-medium leading-6 text-gray-900 hover:bg-gray-200 transition ease-in-out duration-150"
                    >
                      <svg
                        className="flex-shrink-0 h-4 w-4 text-gray-400"
                        fill="none"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                        strokeWidth="2"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                      <span>Modifier</span>
                    </button>
                  </div>
                )}
                <div className="flow-root">
                  <button
                    onClick={() => setShow(true)}
                    type="button"
                    className="-m-2 px-2 py-1 space-x-2 flex items-center rounded-md text-xs font-medium leading-6 text-gray-900 hover:bg-gray-200 transition ease-in-out duration-150"
                  >
                    <svg
                      className="flex-shrink-0 h-4 w-4 text-red-400"
                      fill="none"
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      stroke="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span>Supprimer</span>
                  </button>
                </div>
              </div>
            )
          }
        </div>
      </div>
      <ReplyModal isOpen={open} onClose={() => setOpen(false)} reply={reply} />
      <DeleteModal
        title="Supprimer cette réponse"
        description={message}
        show={show}
        confirmURL={`/forum/replies/remove/${id}`}
        cancelAction={() => setShow(false)}
      />
    </>
  );
};

export default Reply;
