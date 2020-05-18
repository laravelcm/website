import React, { useState } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import axios from "axios";

import ReplyModal from "@/pages/forum/ReplyModal";
import ThreadModal from "@/pages/forum/ThreadModal";
import { ThreadType } from "@/utils/types";
import NotifyAlert from "@/components/NotifyAlert";

interface SidebarProps {
  page?: string;
  thread?: ThreadType;
}

const Sidebar = ({ page, thread }: SidebarProps) => {
  const { auth } = usePage();
  const { user } = auth;
  const [notify, setNotify] = useState(false);
  const [open, setOpen] = useState(false);
  const [show, setShow] = useState(false);
  const [message, setMessage] = useState("");
  const [subscribe, setSubscribe] = useState(thread?.isSubscribedTo ?? false);

  function create(e: React.SyntheticEvent) {
    e.preventDefault();
    if (user === null) {
      setNotify(true);
      setMessage("Vous devez être connecté pour créer sujet.");
    } else {
      setOpen(true);
    }
  }

  function answer(e: React.SyntheticEvent) {
    e.preventDefault();
    if (user === null) {
      setNotify(true);
      setMessage("Vous devez être connecté pour commenter ce sujet.");
    } else {
      setShow(true);
    }
  }

  function follow(e: React.SyntheticEvent) {
    e.preventDefault();
    if (user === null) {
      setNotify(true);
      setMessage("Vous devez être connecté pour pouvoir suivre ce sujet.");
    } else {
      const action = subscribe ? 'delete' : 'post';

      if (action === 'delete') {
        axios.delete(`${thread?.path}/subscriptions`).then(() => {
          setSubscribe(false);
          setNotify(true);
          setMessage("Vous ne suivez plus ce sujet.");
        });
      } else {
        axios.post(`${thread?.path}/subscriptions`).then(() => {
          setSubscribe(true);
          setNotify(true);
          setMessage("Vous vous êtes abonné à ce sujet.");
        });
      }
    }
  }

  return (
    <div className="hidden lg:block">
      <aside className="sticky top-20">
        {page === `forum` && (
          <button type="button" className="btn btn-primary mb-8 py-3 w-full" onClick={create}>Nouveau sujet</button>
        )}
        {page && page === `show` && (
          <>
            <button type="button" className="btn btn-primary mb-2 py-3 w-full" onClick={answer}>Répondre</button>
            <button type="button" className="btn btn-outline-primary mb-8 py-3 w-full flex items-center justify-center" onClick={follow}>
              {
                subscribe
                  ? (
                    <>
                      <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-6 h-6 mr-2">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      Ne plus suivre
                    </>
                  )
                  : "Suivre ce sujet"
              }
            </button>
          </>
        )}
        <ul>
          <li>
            <InertiaLink
              href="/forum"
              className="flex w-full py-2 px-4 items-center hover:bg-brand-100 rounded-md hover:text-brand-primary mb-1"
            >
              <svg className="mr-2 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
              </svg>
              <span className="text-sm">Toutes les discussions</span>
            </InertiaLink>
          </li>
          {
            user && (
              <>
                <li>
                  <InertiaLink
                    href={`/forum?by=${user.username}`}
                    className="flex w-full py-2 px-4 items-center hover:bg-brand-100 rounded-md hover:text-brand-primary mb-1"
                  >
                    <svg className="mr-2 h-6 w-6" viewBox="0 0 24 24" stroke="currentColor" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M8.22766 9C8.77678 7.83481 10.2584 7 12.0001 7C14.2092 7 16.0001 8.34315 16.0001 10C16.0001 11.3994 14.7224 12.5751 12.9943 12.9066C12.4519 13.0106 12.0001 13.4477 12.0001 14M12 17H12.01M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z"
                        strokeWidth="2"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                      />
                    </svg>
                    <span className="text-sm">Mes questions</span>
                  </InertiaLink>
                </li>
                <li>
                  <InertiaLink
                    href="/forum?participate"
                    className="flex w-full py-2 px-4 items-center hover:bg-brand-100 rounded-md hover:text-brand-primary mb-1"
                  >
                    <svg className="mr-2 h-6 w-6" viewBox="0 0 24 24" stroke="currentColor" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M11 5H6C4.89543 5 4 5.89543 4 7V18C4 19.1046 4.89543 20 6 20H17C18.1046 20 19 19.1046 19 18V13M17.5858 3.58579C18.3668 2.80474 19.6332 2.80474 20.4142 3.58579C21.1953 4.36683 21.1953 5.63316 20.4142 6.41421L11.8284 15H9L9 12.1716L17.5858 3.58579Z"
                        strokeWidth="2"
                        strokeLinecap="round"
                        strokeLinejoin="round"
                      />
                    </svg>
                    <span className="text-sm">Mes participations</span>
                  </InertiaLink>
                </li>
              </>
            )
          }
          <li>
            <InertiaLink
              href="/forum?popular=week"
              className="flex w-full py-2 px-4 items-center hover:bg-brand-100 rounded-md hover:text-brand-primary mb-1"
            >
              <svg
                className="mr-2 h-6 w-6"
                viewBox="0 0 24 24"
                fill="current-fill"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M21.565 11.064l-3.504 3.565a.678.678 0 00-.182.585l.827 5.034c.073.442-.038.874-.313 1.214a1.415 1.415 0 01-1.1.538c-.232 0-.457-.058-.667-.174l-4.332-2.377a.623.623 0 00-.59 0l-4.33 2.377a1.408 1.408 0 01-1.768-.364 1.51 1.51 0 01-.312-1.214l.826-5.034a.68.68 0 00-.182-.585l-3.504-3.565a1.534 1.534 0 01-.363-1.534c.17-.546.614-.937 1.158-1.02l4.843-.734a.635.635 0 00.477-.361l2.165-4.58A1.42 1.42 0 0112.001 2c.55 0 1.043.32 1.286.834l2.165 4.58c.092.195.27.33.476.362l4.843.734c.544.083.988.473 1.158 1.02.17.545.03 1.133-.363 1.534h-.001z"
                  fill="currentColor"
                />
              </svg>
              <span className="text-sm">Populaire cette semaine</span>
            </InertiaLink>
          </li>
          <li>
            <InertiaLink
              href="/forum?popular=all"
              className="flex w-full py-2 px-4 items-center hover:bg-brand-100 rounded-md hover:text-brand-primary mb-1"
            >
              <svg
                className="mr-2 h-6 w-6"
                viewBox="0 0 24 24"
                fill="current-fill"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M19.95 11.027a.24.24 0 01-.078.36l-1.462.801a.246.246 0 00-.124.262l.302 1.628a.253.253 0 01-.235.294l-1.669.094a.256.256 0 00-.227.184l-.442 1.594a.253.253 0 01-.338.164l-1.544-.63a.25.25 0 00-.285.066l-1.098 1.247a.256.256 0 01-.38.005l-1.115-1.231a.263.263 0 00-.289-.061l-1.535.654a.252.252 0 01-.343-.16l-.466-1.59a.251.251 0 00-.231-.18l-1.668-.07a.25.25 0 01-.24-.29l.277-1.63a.243.243 0 00-.128-.263l-1.474-.78a.25.25 0 01-.087-.364l.967-1.35a.249.249 0 00-.005-.29l-.986-1.337a.25.25 0 01.082-.363l1.462-.802a.247.247 0 00.124-.262L6.413 5.1a.252.252 0 01.236-.295l1.668-.093a.256.256 0 00.227-.184l.442-1.595a.253.253 0 01.338-.163l1.544.629c.1.04.215.016.285-.066l1.098-1.247a.257.257 0 01.38-.004l1.115 1.23c.074.078.19.103.289.062l1.535-.654a.252.252 0 01.343.159l.463 1.594a.252.252 0 00.23.18l1.669.07a.25.25 0 01.24.29l-.277 1.631a.243.243 0 00.128.262l1.474.78a.25.25 0 01.086.365L18.96 9.4a.249.249 0 00.004.29l.986 1.337zm-7.448 3.055c2.498 0 4.533-2.012 4.533-4.49 0-2.474-2.035-4.49-4.533-4.49s-4.534 2.016-4.534 4.49 2.036 4.49 4.534 4.49zm4.083 2.903l1.26 3.852c.045.138-.087.273-.232.233l-1.498-.433a.186.186 0 00-.199.065l-.962 1.223a.187.187 0 01-.326-.058l-1.32-4.056c.028-.02.053-.045.082-.07l.822-.744 1.065.32c.12.032.248.052.376.052.359 0 .693-.143.932-.384zm-5.789.012l.822.748a.679.679 0 00.083.07L10.38 21.87a.188.188 0 01-.326.058l-.962-1.223a.184.184 0 00-.198-.065l-1.5.433a.185.185 0 01-.23-.233l1.259-3.856a1.32 1.32 0 001.308.331l1.066-.318zm4.394-8.52c.322.024.45.42.202.625l-1.31 1.096.41 1.647c.078.31-.265.556-.537.388l-1.453-.895-1.454.895c-.272.168-.615-.077-.536-.388l.409-1.647-1.31-1.096a.355.355 0 01.207-.626l1.71-.122.644-1.57a.36.36 0 01.664 0l.644 1.57 1.71.122z"
                  fill="currentColor"
                />
              </svg>
              <span className="text-sm">Populaire en tout temps</span>
            </InertiaLink>
          </li>
          <li>
            <InertiaLink
              href="/forum?answered=yes"
              className="flex w-full py-2 px-4 items-center hover:bg-brand-100 rounded-md hover:text-brand-primary mb-1"
            >
              <svg
                className="mr-2 h-6 w-6"
                viewBox="0 0 24 24"
                fill="current-fill"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M12 21a9 9 0 110-18 9 9 0 010 18zm0-1.8a7.2 7.2 0 100-14.4 7.2 7.2 0 000 14.4zm-2.07-7.83l1.17 1.161 2.97-2.97a.9.9 0 011.26 1.278l-3.6 3.6a.9.9 0 01-1.26 0l-1.8-1.8a.9.9 0 011.26-1.278v.009z"
                  fill="currentColor"
                />
              </svg>
              <span className="text-sm">Sujets résolus</span>
            </InertiaLink>
          </li>
          <li>
            <InertiaLink
              href="/forum?answered=no"
              className="flex w-full py-2 px-4 items-center hover:bg-brand-100 rounded-md hover:text-brand-primary mb-1"
            >
              <svg
                className="mr-2 h-6 w-6"
                viewBox="0 0 24 24"
                fill="current-fill"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M5.748 18.474A9 9 0 1118.25 5.527 9 9 0 015.748 18.474zm1.269-1.27A7.204 7.204 0 1017.205 7.017 7.204 7.204 0 007.017 17.205zm6.363-5.093l1.278 1.269a.903.903 0 11-1.278 1.278l-1.27-1.287-1.268 1.278a.903.903 0 11-1.278-1.278l1.287-1.26-1.278-1.27a.903.903 0 111.278-1.277l1.26 1.287 1.269-1.278a.903.903 0 111.278 1.278l-1.287 1.26h.009z"
                  fill="currentColor"
                />
              </svg>
              <span className="text-sm">Non résolus</span>
            </InertiaLink>
          </li>
          <li>
            <InertiaLink
              href="/forum?reply=no"
              className="flex w-full py-2 px-4 items-center hover:bg-brand-100 rounded-md hover:text-brand-primary mb-1"
            >
              <svg
                className="mr-2 h-6 w-6"
                viewBox="0 0 24 24"
                fill="current-fill"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M10 8c7 1 10 6 11 11-2.5-3.5-6-5.1-11-5.1V18l-7-7 7-7v4z"
                  fill="currentColor"
                />
              </svg>
              <span className="text-sm">Aucune réponse</span>
            </InertiaLink>
          </li>
        </ul>
        {
          user !== null && (
            <>
              <ReplyModal isOpen={show} onClose={() => setShow(false)} thread={thread} />
              <ThreadModal isOpen={open} onClose={() => setOpen(false)} />
            </>
          )
        }
      </aside>
      <NotifyAlert show={notify} onClose={() => setNotify(false)} message={message} />
    </div>
  );
};

Sidebar.defaultProps = {
  page: `forum`,
};

export default Sidebar;
