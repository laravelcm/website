import React from "react";
import ReactMarkdown from "react-markdown/with-html";

import { timeAgo } from "@/utils/helpers";
import { NotificationType } from "@/utils/types";

interface NotificationProps {
  notification: NotificationType;
  readNotification: (e: React.SyntheticEvent, id: number) => void;
}

export default ({ notification, readNotification }: NotificationProps) => {
  const { id, data, created_at } = notification;
  const { message, action, link } = data;

  function getCurrentPath(currentAction: string) {
    switch (currentAction) {
      case 'mention':
        return "M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207";
      case 'reply':
        return "M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6";
      default:
        return "M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9";
    }
  }

  return (
    <div className="relative flex p-3 text-sm z-100 border-b border-gray-50 bg-gray-100 hover:bg-gray-200">
      <span className="w-8 mr-3 mt-3 flex">
        <svg className="h-5 w-5 text-brand-200" stroke="currentColor" fill="none" viewBox="0 0 24 24">
          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d={getCurrentPath(action)} />
        </svg>
      </span>
      <div>
        <a href={link}>
          <ReactMarkdown source={message} escapeHtml={false} />
        </a>
        <span className="flex items-center justify-between items-center mt-1">
          <span className="flex items-center text-gray-400 text-xs">
            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" className="w-4 h-4 mr-2">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {timeAgo(created_at)}
          </span>
          <a href="#" title="Marqué lu" onClick={(e) => readNotification(e, id)} className="text-gray-800">
            <svg viewBox="0 0 20 20" fill="currentColor" className="w-6 h-6">
              <path fillRule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clipRule="evenodd" />
            </svg>
          </a>
        </span>
      </div>
    </div>
  );
};
