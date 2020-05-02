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
  <div className="w-full">
    <InertiaLink
      className="block rounded-lg bg-white h-75 shadow-md hover:shadow-lg overflow-hidden"
      href={`/blog/${post.slug}`}
    >
      <img
        src={post.image}
        className="object-cover w-full h-45 lg:h-40"
        alt={post.title}
      />
      <div className="p-4 flex flex-col justify-between">
        <div className="space-y-1">
          <span className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
            {post.category.name}
          </span>
          <span className="h-10 flex text-truncate">
            <h4 className="text-sm text-gray-700 font-medium text-wrap">{post.title}</h4>
          </span>
        </div>
        <span className="flex mt-6 items-center">
          <img
            src={post.creator?.picture}
            className="h-12 w-12 rounded-full mr-4"
            alt={post.creator?.full_name}
          />
          <span className="flex flex-col">
            <span className="text-sm text-gray-600">{post.creator?.full_name}</span>
            <small className="text-xs text-gray-400 capitalize">Le {format(new Date(post.published_at), "dd MMMM, y", { locale: fr })}</small>
          </span>
        </span>
      </div>
    </InertiaLink>
  </div>
);
