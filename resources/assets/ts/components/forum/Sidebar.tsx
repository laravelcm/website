import React, { useState } from "react";
import { InertiaLink, usePage } from "@inertiajs/inertia-react";
import { useToast, useDisclosure } from "@chakra-ui/core";

import ReplyModal from "@/pages/forum/ReplyModal";
import ThreadModal from "@/pages/forum/ThreadModal";

interface SidebarProps {
  page?: string;
  threadSlug?: string;
}

const Sidebar = ({ page, threadSlug }: SidebarProps) => {
  const { auth } = usePage();
  const { user } = auth;
  const toast = useToast();
  const { isOpen, onOpen, onClose } = useDisclosure();
  const [open, setOpen] = useState(false);

  function create(e: React.SyntheticEvent) {
    e.preventDefault();
    if (user === null) {
      toast({
        position: `bottom-right`,
        title: `Attention.`,
        description: `Vous devez être connecté pour créer sujet.`,
        status: "info",
        duration: 5000,
        isClosable: true,
      });
    } else {
      setOpen(true);
    }
  }

  function answer(e: React.SyntheticEvent) {
    e.preventDefault();
    if (user === null) {
      toast({
        position: `bottom-right`,
        title: `Attention.`,
        description: `Vous devez être connecté pour pouvoir commenter ce sujet.`,
        status: "info",
        duration: 5000,
        isClosable: true,
      });
    } else {
      onOpen();
    }
  }

  function follow(e: React.SyntheticEvent) {
    e.preventDefault();
    if (user === null) {
      toast({
        position: `bottom-right`,
        title: `Attention.`,
        description: `Vous devez être connecté pour pouvoir suivre ce sujet.`,
        status: "info",
        duration: 5000,
        isClosable: true,
      });
    }
  }

  return (
    <div className="hidden lg:block w-3/12 pr-10">
      {page === `forum` && (
        <button type="button" className="btn btn-primary mb-8 py-3 w-full" onClick={create}>Nouveau sujet</button>
      )}
      {page && page === `show` && (
        <>
          <button type="button" className="btn btn-primary mb-2 py-3 w-full" onClick={answer}>Répondre</button>
          <button type="button" className="btn btn-outline-primary mb-8 py-3 w-full" onClick={follow}>Suivre ce sujet</button>
        </>
      )}
      <ul>
        <li>
          <InertiaLink
            href="/forum"
            className="flex w-full py-2 px-4 items-center hover:bg-brand-100 rounded-md hover:text-brand-primary mb-1"
          >
            <svg className="mr-2 h-6 w-6" viewBox="0 0 24 24" fill="current-fill" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M19.8519 5.19442L21 18.1149C21 18.2074 20.9691 18.2696 20.9381 18.3312C20.8763 18.3929 20.8138 18.4237 20.721 18.4551L16.6665 18.8115L16.5945 19.7221C16.5945 19.8767 16.4702 20 16.284 20L9.70567 19.4234L7.72062 19.5982C7.65875 19.5982 7.56537 19.5674 7.53444 19.5366C7.47256 19.4749 7.44163 19.4127 7.41013 19.3203L7.40225 19.2345L3.2831 18.8877C3.12785 18.8877 2.9726 18.733 3.0041 18.5475L4.15216 5.5962C4.15216 5.50374 4.18309 5.44154 4.27647 5.3799C4.33834 5.31826 4.43172 5.28688 4.49359 5.31826L9.52229 5.77104L13.9429 5.3883C13.8918 5.21907 13.8636 5.04031 13.8636 4.85483C13.8636 3.83495 14.7012 3 15.7255 3C16.7498 3 17.5873 3.83439 17.5873 4.85483C17.5873 4.93552 17.5817 5.01454 17.5716 5.09243L19.5111 4.91703C19.6663 4.91703 19.8216 5.04087 19.8525 5.19498L19.8519 5.19442ZM15.7255 3.61809C15.0426 3.61809 14.4846 4.17454 14.4846 4.85427C14.4846 5.07394 14.5431 5.28071 14.6455 5.46059C14.6539 5.47292 14.6624 5.48693 14.6702 5.50206C14.7079 5.56314 14.7512 5.6203 14.7985 5.67353C14.8187 5.68642 14.8384 5.70155 14.857 5.71948C14.8756 5.73742 14.8902 5.75703 14.9031 5.77776C15.0904 5.94363 15.3272 6.05403 15.5888 6.08261C15.5989 6.08373 15.6096 6.08485 15.6197 6.08541C15.631 6.08653 15.6422 6.08765 15.654 6.08821C15.6777 6.08933 15.7019 6.09045 15.7255 6.09045C15.7542 6.09045 15.7829 6.08933 15.8115 6.08709C15.816 6.08709 15.82 6.08653 15.8245 6.08597C16.2829 6.04786 16.6997 5.7503 16.8735 5.3177C16.8786 5.2964 16.887 5.27735 16.8972 5.25942C16.9416 5.13221 16.9663 4.99604 16.9663 4.85371C16.9663 4.17398 16.4078 3.61753 15.7255 3.61753V3.61809ZM3.65547 18.2696L7.34375 18.5783L6.26151 6.36896C6.26151 6.27649 6.29245 6.21429 6.32339 6.15265L6.35432 6.12183L4.74109 5.96717L3.65547 18.2696ZM16.0045 19.3517L16.0349 18.8675L13.2618 19.1112L16.0045 19.3517ZM7.99962 18.9185L20.3486 17.8364L19.2625 5.534L17.3865 5.68698C17.0788 6.29162 16.4489 6.70854 15.7255 6.70854C15.3239 6.70854 14.9509 6.57966 14.6461 6.36223L13.1504 7.85226C13.0885 7.9139 13.0261 7.94472 12.9333 7.94472C12.8405 7.94472 12.778 7.9139 12.7161 7.85226C12.5918 7.72842 12.5918 7.54293 12.7161 7.41965L14.1651 5.97614L9.76923 6.36391C9.73154 6.38633 9.68936 6.39978 9.64436 6.39978L6.91682 6.6469L7.99962 18.9185ZM16.7183 10.1403C16.563 10.1403 16.4078 10.0164 16.4078 9.86231C16.4078 9.70821 16.5321 9.55299 16.6868 9.52217L17.6177 9.42971C17.773 9.42971 17.9282 9.55355 17.9592 9.70765C17.9592 9.86231 17.8348 10.017 17.6802 10.0478L16.7183 10.1403ZM13.3051 10.4496C13.1498 10.4496 13.0261 10.3257 12.9946 10.1716C12.9946 10.017 13.1189 9.86231 13.2736 9.83149L15.4454 9.64601C15.6006 9.61519 15.7559 9.76985 15.7868 9.92395C15.7868 10.0786 15.6625 10.2333 15.5078 10.2641L13.3051 10.4496ZM12.1261 10.542L9.30292 10.7892C9.14767 10.7892 9.02392 10.6653 8.99242 10.5112C8.99242 10.3566 9.11674 10.2019 9.27142 10.1711L12.0636 9.92395C12.2498 9.89313 12.3741 10.0478 12.4051 10.2019C12.4051 10.3566 12.2808 10.5112 12.1261 10.542ZM17.773 11.284C17.9282 11.2532 18.0835 11.4078 18.1144 11.5619C18.1144 11.7474 17.9901 11.8712 17.8354 11.9021L15.6327 12.0876C15.4774 12.0876 15.3537 11.9637 15.3222 11.8096C15.3222 11.6549 15.4465 11.5003 15.6012 11.4695L17.773 11.284ZM11.3195 12.1806C11.3195 12.0259 11.4438 11.8712 11.599 11.8404L13.7708 11.6549C13.9261 11.6549 14.0813 11.7788 14.1123 11.9329C14.1432 12.087 13.9879 12.2422 13.8333 12.273L11.6305 12.4585C11.4753 12.4585 11.3515 12.3347 11.32 12.1806H11.3195ZM10.4195 12.551L9.45761 12.6434C9.30236 12.6434 9.17861 12.5196 9.14711 12.3655C9.14711 12.2108 9.27142 12.0562 9.42611 12.0253L10.357 11.9329C10.5432 11.9021 10.6675 12.0567 10.6985 12.2108C10.6985 12.3655 10.5742 12.5202 10.4195 12.551ZM17.9282 13.1382C18.0835 13.1074 18.2387 13.2621 18.2696 13.4162C18.2696 13.5709 18.1453 13.7255 17.9907 13.7563L17.3393 13.818C17.184 13.818 17.0288 13.6941 17.0288 13.54C17.0288 13.3859 17.1531 13.2307 17.3078 13.1999L17.9282 13.1382ZM16.0979 13.2929C16.2531 13.2621 16.4084 13.4168 16.4393 13.5709C16.4702 13.725 16.315 13.8802 16.1603 13.911L13.0266 14.1889C12.8714 14.1889 12.7476 14.0651 12.7161 13.911C12.7161 13.7563 12.8405 13.6017 12.9951 13.5709L16.0979 13.2929ZM11.1333 13.7569C11.3195 13.7261 11.4438 13.8807 11.4747 14.0348C11.4747 14.1895 11.3504 14.3442 11.1957 14.375L9.61342 14.4988C9.45817 14.4988 9.33442 14.375 9.30292 14.2209C9.30292 14.0662 9.42723 13.9116 9.58192 13.8807L11.1333 13.7569ZM18.1144 14.9931C18.2697 14.9931 18.4249 15.1169 18.4558 15.271C18.4558 15.4257 18.3315 15.5803 18.1768 15.6112L15.0432 15.8891C14.8879 15.8891 14.7642 15.7653 14.7327 15.6112C14.7327 15.4565 14.857 15.3018 15.0117 15.271L18.1144 14.9931ZM13.1498 15.4257C13.3051 15.3949 13.4603 15.5495 13.4913 15.7036C13.5222 15.8577 13.3669 16.013 13.2123 16.0438L11.9399 16.1362C11.7846 16.1362 11.6609 16.0124 11.6294 15.8583C11.6294 15.7036 11.7537 15.549 11.9084 15.5181L13.1498 15.4257ZM10.6681 15.6112C10.8543 15.5803 10.9786 15.735 11.0095 15.8891C11.0095 16.0438 10.8852 16.1984 10.7305 16.2293L9.76867 16.3217C9.61342 16.3217 9.48967 16.1979 9.45817 16.0438C9.45817 15.8891 9.58248 15.7344 9.73717 15.7036L10.6681 15.6112Z"
                fill="currentColor"
              />
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
      <ReplyModal isOpen={isOpen} onClose={onClose} threadSlug={threadSlug} />
      <ThreadModal isOpen={open} onClose={() => setOpen(false)} />
    </div>
  );
};

Sidebar.defaultProps = {
  page: `forum`,
};

export default Sidebar;
