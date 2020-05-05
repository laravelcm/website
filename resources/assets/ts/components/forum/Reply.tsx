import React, { useState } from "react";
import { Inertia } from "@inertiajs/inertia";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import ReactMarkdown from "react-markdown";
import classNames from "classnames";

import { timeAgo } from "@/utils/helpers";
import { ReplyType } from "@/utils/types";
import DeleteModal from "@/components/DeleteModal";

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
  const className = classNames(
    `flex flex-col px-6 py-4 rounded-lg mb-2`,
    {
      'reply-header': (user !== null && user.id === owner.id) || (user !== null && user.is_admin),
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
              {owner.is_admin && <span className="text-brand-200 text-sm mt-1">Admin</span>}
            </div>
            <p>
              <span className="text-gray-800 font-medium">@{owner.username}</span>
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
                  meilleure réponse
                </button>
              )
            }
            {
              (isBest) && (
                <>
                  <span className="text-xs text-center py-2 px-3 rounded-full bg-opacity-primary text-brand-primary md:text-sm">
                    Meilleure reponse
                  </span>
                </>
              )
            }
            <button id={`reply-${id}`} className="ml-4 hidden reply-remove" type="button" onClick={() => setShow(true)}>
              <svg className="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth="2"
                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                />
              </svg>
            </button>
          </div>
        </div>
        <div className="mt-6">
          <div className="content-body text-gray-800 text-base md:text-sm">
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
        </div>
      </div>
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
