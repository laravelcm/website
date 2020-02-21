import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";
import ReactMarkdown from "react-markdown";

import { timeAgo } from "@/utils/helpers";
import { ReplyType } from "@/utils/types";

interface ReplyProps {
  reply: ReplyType;
  bestReplyId: number | null;
}

const Reply = ({ reply, bestReplyId }: ReplyProps) => {
  const {
    id,
    body,
    owner,
    created_at,
  } = reply;
  const solvedClass = (bestReplyId && bestReplyId === id) ? `bg-brand-100` : `hover:bg-gray-100`;
  return (
    <div className={`flex flex-col px-6 py-4 rounded-lg mb-2 ${solvedClass}`}>
      <div className="flex items-center justify-between">
        <div className="flex items-center">
          <InertiaLink
            href={`/u/@${owner.username}`}
            className="h-10 w-10 flex items-center mr-4"
          >
            <img
              className="rounded-full bg-cover"
              src={owner.picture}
              alt={owner.full_name}
            />
          </InertiaLink>
          <p>
            <span className="text-gray-800 font-medium">@{owner.username}</span>
            <span className="text-gray-500 text-sm ml-2 hidden md:inline-flex">{timeAgo(created_at)}</span>
          </p>
        </div>
        {
          (bestReplyId && bestReplyId === id) && (
            <div className="flex items-center">
              <span className="text-xs text-center font-bold py-2 px-3 rounded-full bg-opacity-primary text-brand-primary md:text-sm">
                Meilleure reponse
              </span>
            </div>
          )
        }
      </div>
      <div className="mt-6">
        <div className="content-body text-gray-800 text-base md:text-sm">
          <ReactMarkdown source={body} escapeHtml={false} />
        </div>
      </div>
    </div>
  );
};

export default Reply;
