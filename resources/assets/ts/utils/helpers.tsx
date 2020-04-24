import React, { SyntheticEvent } from "react";
import { Inertia } from "@inertiajs/inertia";
import TimeAgo from "timeago-react";
import * as timeago from "timeago.js";
import fr from 'timeago.js/lib/lang/fr';

// register fr.
timeago.register('fr', fr);

/**
 * ansiWordBound
 *
 * @param c
 */
const ansiWordBound = (c: any) => c === " " || c === "\n" || c === "\r" || c === "\t";

/**
 * Reading Time Options.
 *
 * @param text string
 * @param options object.
 */
type options = {
  wordsPerMinute?: number;
  wordBound?: (c: any) => boolean;
};

/**
 * readingTime
 *
 * Returns the reading time of the text passed as a parameter.
 *
 * @param text string
 * @param options object
 * @return object { text, minutes, time, word }
 */
export const readingTime = (text: string, options: options) => {
  let words = 0;
  let start = 0;
  let end = text.length - 1;
  let i;

  options = options || {};

  // use default values if necessary
  options.wordsPerMinute = options.wordsPerMinute || 200;

  // use provided function if available
  const wordBound = options.wordBound || ansiWordBound;

  // fetch bounds
  while (wordBound(text[start])) start++;
  while (wordBound(text[end])) end--;

  // calculate the number of words
  for (i = start; i <= end;) {
    for (; i <= end && !wordBound(text[i]); i++);
    words++;
    for (; i <= end && wordBound(text[i]); i++);
  }

  // reading time stats
  const minutes = words / options.wordsPerMinute;
  const time = minutes * 60 * 1000;
  const displayed = Math.ceil(Number(minutes.toFixed(2)));

  return {
    text: `${displayed} min de lecture`,
    minutes,
    time,
    words,
  };
};

/**
 * toCapitalize
 *
 * Puts the first letter of the text passed as parameter in uppercase.
 *
 * @param s
 * @return string
 */
export const toCapitalize = (s: string) => s.substr(0, 1).toUpperCase() + s.substr(1).toLowerCase();

/**
 * navigate
 *
 * Inertia navigate to another route.
 *
 * @param e SyntheticEvent
 * @param url string
 * @param options object.
 * @return void
 */
export const navigate = (e: SyntheticEvent, url: string, options?: object) => {
  e.stopPropagation();
  Inertia.visit(url, { method: "get", ...options });
};

/**
 * trimmedString
 *
 * Trim given string with the limit word.
 *
 * @param word
 * @param limit
 */
export const trimmedString = (word: string, limit = 55) => (word.length > limit ? `${word.substring(0, limit - 3)}...` : word);

/**
 * timeAgo
 *
 * Return the time ago for a current post.
 *
 * @param date
 * @return string
 */
export const timeAgo = (date: Date) => <TimeAgo datetime={date} locale="fr" />;

/**
 * Share to social network.
 *
 * @param url
 * @param title
 * @param width
 * @param height
 */
export const popupCenter = (url: string, title: string, width?: number, height?: number) => {
  const popupWidth = width || 640;
  const popupHeight = height || 440;
  const windowLeft = window.screenLeft || window.screenX;
  const windowTop = window.screenTop || window.screenY;
  const windowWidth = window.innerWidth || document.documentElement.clientWidth;
  const windowHeight = window.innerHeight || document.documentElement.clientHeight;
  const popupLeft = windowLeft + windowWidth / 2 - popupWidth / 2;
  const popupTop = windowTop + windowHeight / 2 - popupHeight / 2;
  window.open(url, title, `scrollbars=yes, width=${popupWidth}, height=${popupHeight}, top=${popupTop}, left=${popupLeft}`);
};

/**
 * Group array;
 *
 * @param  xs
 * @param key
 */
export const groupBy = (xs: Array<any>, key: string) => xs.reduce((rv, x) => {
  (rv[x[key]] = rv[x[key]] || []).push(x);
  return rv;
}, {});
