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
