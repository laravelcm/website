import React, { useState } from "react";
import { InertiaLink } from "@inertiajs/inertia-react";

import { PostType } from "@/utils/types";
import DeleteModal from "@/components/DeleteModal";

interface PostPublish {
  post: PostType;
}

export default ({ post }: PostPublish) => {
  const [show, setShow] = useState(false);

  return (
    <>
      <li key={post.id}>
        <div className="rounded-lg bg-white shadow-lg overflow-hidden">
          <div className="p-4 sm:p-6 flex sm:space-x-8">
            <div className="hidden sm:block flex-shrink-0">
              {post.image && (
                <img
                  className="w-32 h-20 object-cover rounded-md"
                  src={post.image}
                  alt={post.title}
                />
              )}
              {!post.image && (
                <div className="h-20 w-32 bg-gray-200 flex items-center justify-center rounded-md">
                  <svg className="h-6 w-6 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path
                      strokeLinecap="round"
                      strokeLinejoin="round"
                      strokeWidth="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                  </svg>
                </div>
              )}
            </div>
            <div className="space-y-1 w-0 flex-1">
              <div className="flex items-center justify-between">
                <span className="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-green-100 text-green-800">
                  {post.category.name}
                </span>
                <div className="flex items-center space-x-4">
                  <span
                    className={`inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 capitalize ${post.status_classname}`}
                  >
                    {post.status}
                  </span>
                  <small className="text-xs leading-5 text-gray-400">
                    {post.visits} vues
                  </small>
                </div>
              </div>
              <h4 className="text-base leading-6 font-medium text-gray-900 truncate mt-1">
                {post.title}
              </h4>
              <p className="text-sm leading-5 text-gray-500">{post.summary}</p>
            </div>
          </div>
          <div className="bg-gray-50 space-y-6 px-4 py-5 sm:flex sm:space-y-0 sm:space-x-10 sm:px-6 lg:px-8">
            {post.status === "PUBLISHED" && (
              <div className="flow-root">
                <InertiaLink
                  href={`/blog/${post.slug}`}
                  className="-m-2 px-2 py-1.5 space-x-3 flex items-center rounded-md text-sm leading-6 font-medium text-gray-900 hover:bg-gray-100 transition ease-in-out duration-150"
                >
                  <svg
                    className="flex-shrink-0 h-6 w-6 text-gray-400"
                    fill="none"
                    strokeLinecap="round"
                    strokeLinejoin="round"
                    strokeWidth="2"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                  >
                    <path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                  </svg>
                  <span>Afficher</span>
                </InertiaLink>
              </div>
            )}
            <div className="flow-root">
              <InertiaLink
                href={`/publishing/propose/${post.id}`}
                className="-m-2 px-2 py-1.5 space-x-3 flex items-center rounded-md text-sm leading-6 font-medium text-gray-900 hover:bg-gray-100 transition ease-in-out duration-150"
              >
                <svg
                  className="flex-shrink-0 h-6 w-6 text-gray-400"
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
              </InertiaLink>
            </div>
            <div className="flow-root">
              <button
                onClick={() => setShow(true)}
                type="button"
                className="-m-2 px-2 py-1.5 space-x-3 flex items-center rounded-md text-sm leading-6 font-medium text-gray-900 hover:bg-gray-100 transition ease-in-out duration-150"
              >
                <svg
                  className="flex-shrink-0 h-6 w-6 text-red-400"
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
        </div>
      </li>
      <DeleteModal
        title={`Suppression de l'article ${post.title}`}
        description="Voulez-vous vraiment désactiver cet article? Cet article n'apparaitra plus sur le site de façon définitive."
        show={show}
        confirmURL={`/publishing/propose/${post.id}`}
        cancelAction={() => setShow(false)}
      />
    </>
  );
};
