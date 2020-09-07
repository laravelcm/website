import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import { navigate, timeAgo, trimmedString } from "@/utils/helpers";
import { ThreadType } from "@/utils/types";

const Thread = (thread: ThreadType) => {
  const {
    title,
    resume,
    best_reply_id,
    creator,
    channel,
    visits,
    path,
    replies_count,
    last_reply,
    local_created_at,
  } = thread;
  const author = last_reply === null ? (
    <div className="text-xs text-gray-500">
      <InertiaLink href={`/u/@${creator.username}`} className="link font-medium">
        {creator.username}
      </InertiaLink>
      <span>
        {" "}
        a posté {" "}
        <span className="text-gray-700 font-medium">{timeAgo(local_created_at)}</span>
      </span>
    </div>
  ) : (
    <div className="text-xs text-gray-500">
      <InertiaLink href={`/u/@${last_reply.owner.username}`} className="link font-medium">
        {last_reply.owner.username}
      </InertiaLink>
      <span>
        {" "}
        a répondu{" "}
        <span className="text-gray-700 font-medium">{timeAgo(last_reply.local_created_at)}</span>
      </span>
    </div>
  );
  return (
    <div className="cursor-pointer bg-gray-50 px-6 py-4 flex flex-col justify-between mb-2 rounded-lg md:border-0 md:bg-transparent hover:bg-white md:flex-row md:items-center transition-all">
      <div className="flex items-center justify-between mb-4 md:mb-0 md:mr-6">
        <div className="flex items-center">
          <div className="h-12 w-12 flex items-center justify-center rounded-full">
            <InertiaLink href={`/u/@${creator.username}`} className="h-12 w-12 block flex-shrink-0 text-center">
              <span className="block mb-2">
                <img
                  className={`rounded-full border-2 ${creator.is_admin ? 'border-green-600' : 'border-transparent'} h-full w-full object-cover`}
                  src={creator.picture}
                  alt={creator.full_name}
                />
              </span>
            </InertiaLink>
          </div>
          <span className="text-sm text-gray-800 ml-3 font-medium md:hidden">
            @{creator.username}
          </span>
        </div>
        <div className="flex items-center md:hidden text-sm">
          <div className="flex mr-3 items-center">
            <svg className="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M4 9.333H2.667A1.333 1.333 0 011.334 8V2.667c0-.734.6-1.334 1.333-1.334h8A1.333 1.333 0 0112 2.667V4h1.334a1.333 1.333 0 011.333 1.333V14a.666.666 0 01-1.133.467L11.053 12h-5.72A1.333 1.333 0 014 10.667V9.333zM4 8V5.333C4 4.6 4.6 4 5.333 4h5.334V2.667h-8V8H4zm9.334-2.667h-8v5.334h6a.667.667 0 01.466.2l1.534 1.526v-7.06z"
                fill="currentColor"
              />
            </svg>
            <span>{replies_count}</span>
          </div>
          <InertiaLink
            href={`/forum/channels/${channel.slug}`}
            className={`text-xs font-medium py-2 px-3 rounded-full bg-opacity-${channel.slug} text-brand-${channel.slug}`}
          >
            {channel.name}
          </InertiaLink>
        </div>
      </div>
      <div className="flex-1 md:pr-10">
        <h4 className="inline-flex items-center text-gray-800 font-medium mb-1 md:text-lg md:mb-2">
          <InertiaLink href={path}>
            {trimmedString(title)}
            {best_reply_id !== null && (
              <span className="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
                Sujet résolu
              </span>
            )}
          </InertiaLink>
        </h4>
        <p
          onClick={(e) => navigate(
            e,
            path,
          )}
          className="text-sm mb-2 md:mb-3"
        >
          {resume}
        </p>
        {author}
      </div>
      <div className="hidden md:flex flex-col">
        <InertiaLink
          href={`/forum/channels/${channel.slug}`}
          className={`text-xs text-center font-bold py-2 px-3 rounded-full bg-opacity-${channel.slug} text-brand-${channel.slug} md:text-sm md:mb-3`}
        >
          {channel.name}
        </InertiaLink>
        <div className="flex items-center text-sm">
          <div className="flex mr-4 text items-center">
            <svg className="h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M4 9.333H2.667A1.333 1.333 0 011.334 8V2.667c0-.734.6-1.334 1.333-1.334h8A1.333 1.333 0 0112 2.667V4h1.334a1.333 1.333 0 011.333 1.333V14a.666.666 0 01-1.133.467L11.053 12h-5.72A1.333 1.333 0 014 10.667V9.333zM4 8V5.333C4 4.6 4.6 4 5.333 4h5.334V2.667h-8V8H4zm9.334-2.667h-8v5.334h6a.667.667 0 01.466.2l1.534 1.526v-7.06z"
                fill="currentColor"
              />
            </svg>
            <span>{replies_count}</span>
          </div>
          <div className="flex items-center">
            <svg
              className="h-5 w-5 mr-1"
              viewBox="0 0 25 25"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M17.56 17.66a8 8 0 01-11.32 0L1.3 12.7a1 1 0 010-1.42l4.95-4.95a8 8 0 0111.32 0l4.95 4.95a1 1 0 010 1.42l-4.95 4.95-.01.01zm-9.9-1.42a6 6 0 008.48 0L20.38 12l-4.24-4.24a6 6 0 00-8.48 0L3.4 12l4.25 4.24h.01zM11.9 16a4 4 0 110-8 4 4 0 010 8zm0-2a2 2 0 100-4 2 2 0 000 4z"
                fill="currentColor"
              />
            </svg>
            <span>{visits}</span>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Thread;
