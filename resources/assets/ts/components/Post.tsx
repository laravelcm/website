import React from "react";
import { InertiaLink } from "@inertiajs/inertia-react";
// eslint-disable-next-line import/no-duplicates
import { format } from "date-fns";
// eslint-disable-next-line import/no-duplicates
import fr from "date-fns/locale/fr";

import { PostType } from "@/utils/types";

interface Props {
  post: PostType;
}

export default ({ post }: Props) => (
  <div className="w-full md:w-1/2 md:mb-5 lg:w-1/4 lg:mb-6 md:px-4">
    <InertiaLink
      className="block rounded-lg bg-white h-75 shadow-md hover:shadow-lg"
      href={`/blog/${post.slug}`}
    >
      <img
        src={post.image}
        className="bg-cover w-full h-45 rounded-t-lg lg:h-40"
        alt={post.title}
      />
      <span className="p-4 flex flex-col justify-between">
        <span className="h-10 flex text-truncate">
          <h4 className="text-sm text-gray-700 font-medium text-wrap">{post.title}</h4>
        </span>
        <span className="flex mt-6 items-center">
          <img
            src={post.creator?.picture}
            className="h-12 w-12 rounded-full mr-4"
            alt={post.creator?.full_name}
          />
          <span className="flex flex-col">
            <span className="text-sm text-gray-600">{post.creator?.full_name}</span>
            <small className="text-xs text-gray-400 capitalize">Le {format(new Date(post.created_at), "dd MMMM, y", { locale: fr })}</small>
          </span>
        </span>
      </span>
    </InertiaLink>
  </div>
);
