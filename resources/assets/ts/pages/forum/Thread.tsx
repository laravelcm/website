import React, { useEffect, useState } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import ReactMarkdown from "react-markdown";
import { useDisclosure, useToast } from "@chakra-ui/core";
import classNames from "classnames";
import hljs from "highlight.js";

import Layout from "@/includes/Layout";
import Seo from "@/includes/Seo";
import Breadcrumb from "@/includes/Breadcrumb";

import { ReplyType, ThreadType } from "@/utils/types";
import { timeAgo } from "@/utils/helpers";
import Sidebar from "@/components/forum/Sidebar";
import Reply from "@/components/forum/Reply";
import ReplyModal from "@/pages/forum/ReplyModal";
import DeleteModal from "@/components/DeleteModal";

const Thread = () => {
  const { thread, auth, flash } = usePage();
  const { user } = auth;
  const { isOpen, onOpen, onClose } = useDisclosure();
  const [show, setShow] = useState(false);
  const toast = useToast();
  const {
    slug,
    title,
    body,
    creator,
    channel,
    visits,
    replies_count,
    created_at,
    replies,
  }: ThreadType = thread;
  const className = classNames(
    `bg-white shadow flex flex-col px-6 py-4 rounded-lg mb-4`,
    {
      'thread-header': (user !== null && user.id === creator.id) || (user !== null && user.is_admin),
    },
  );

  useEffect(() => {
    updateCodeSyntaxHighlighting();

    if (flash.success) {
      toast({
        position: `bottom-right`,
        description: flash.success,
        status: `success`,
        duration: 3000,
        isClosable: true,
      });
    }
  }, []);

  function updateCodeSyntaxHighlighting() {
    document.querySelectorAll("pre code").forEach((block) => {
      hljs.highlightBlock(block);
    });
  }

  return (
    <>
      <Seo title={title} />
      <Breadcrumb
        homeLink="/forum"
        homeTitle="Forum"
        parentTitle={channel.name}
        parentLink={`/forum/channels/${channel.slug}`}
        title={title}
      />
      <div className="bg-white py-4 lg:hidden">
        <div className="container">
          <h1 className="text-lg md:text-xl text-gray-800">{title}</h1>
        </div>
      </div>
      <div className="container mt-12">
        <div className="flex w-full">
          <Sidebar page="show" thread={thread} />
          <div className="w-full lg:w-9/12">
            <div className={className}>
              <div className="flex items-center justify-between">
                <div className="flex items-center">
                  <InertiaLink
                    href={`/u/@${creator.username}`}
                    className="h-10 w-10 flex items-center mr-4"
                  >
                    <img
                      className="rounded-full bg-cover"
                      src={creator.picture}
                      alt={creator.full_name}
                    />
                  </InertiaLink>
                  <p>
                    <span className="text-gray-800 font-medium">@{creator.username}</span>
                    <span className="text-gray-500 text-sm ml-2 hidden md:inline-flex">{timeAgo(created_at)}</span>
                  </p>
                </div>
                <div className="flex items-center">
                  <div className="flex items-center thread-metadata">
                    <div className="mr-4 text items-center hidden sm:flex">
                      <svg
                        className="h-5 w-5 mr-1"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M4 9.333H2.667A1.333 1.333 0 011.334 8V2.667c0-.734.6-1.334 1.333-1.334h8A1.333 1.333 0 0112 2.667V4h1.334a1.333 1.333 0 011.333 1.333V14a.666.666 0 01-1.133.467L11.053 12h-5.72A1.333 1.333 0 014 10.667V9.333zM4 8V5.333C4 4.6 4.6 4 5.333 4h5.334V2.667h-8V8H4zm9.334-2.667h-8v5.334h6a.667.667 0 01.466.2l1.534 1.526v-7.06z"
                          fill="currentColor"
                        />
                      </svg>
                      <span>{replies_count}</span>
                    </div>
                    <div className="mr-4 items-center hidden sm:flex">
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
                    <InertiaLink
                      href={`/forum/channels/${channel.slug}`}
                      className={`text-xs text-center font-bold py-2 px-3 rounded-full bg-opacity-${channel.slug} text-brand-${channel.slug} md:text-sm`}
                    >
                      {channel.name}
                    </InertiaLink>
                  </div>
                  <button className="ml-4 hidden thread-remove" type="button" onClick={() => setShow(true)}>
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
            {
              replies.map((reply: ReplyType) => (
                <Reply key={reply.id} reply={reply} />
              ))
            }
            <div className="mt-10">
              {
                user === null && (
                  <p className="text-center text-gray-800 font-medium">
                    Veuillez vous <InertiaLink href="/login" className="link">connecter</InertiaLink>{" "}
                    ou{" "}
                    <InertiaLink href="/register" className="link">créer un compte</InertiaLink> pour participer à cette conversation.
                  </p>
                )
              }
              {
                user !== null && (
                  <>
                    <div className="flex items-center px-6">
                      <img src={user.picture} alt={user.full_name} className="h-12 w-12 rounded-full mr-4" />
                      <button
                        className="w-full bg-white text-left shadow text-sm p-6 rounded-md hover:shadow-md"
                        type="button"
                        onClick={onOpen}
                      >
                        Laisser un commentaire...
                      </button>
                    </div>
                    <ReplyModal isOpen={isOpen} onClose={onClose} thread={thread} />
                  </>
                )
              }
            </div>
          </div>
        </div>
      </div>
      <DeleteModal
        title="Supprimer le Sujet"
        description="Voulez-vous vraiment supprimer ce sujet? Toutes les réponses seront définitivement supprimées. Cette action ne peut pas être annulée."
        show={show}
        confirmURL={`/forum/${channel.slug}/${slug}`}
        cancelAction={() => setShow(false)}
      />
    </>
  );
};

Thread.layout = (page: React.ReactNode) => <Layout child={page} />;

export default Thread;
