export type User = {
  id: number;
  picture: string;
  full_name: string;
  username: string;
  email: string;
  isAdmin: boolean;
}

export type ChannelType = {
  id: number;
  name: string;
  slug: string;
}

export type ThreadType = {
  id: number;
  title: string;
  slug: string;
  replies_count: number;
  body: string;
  path: string;
  visits: number;
  locked: boolean;
  best_reply_id: number | null;
  channel: ChannelType;
  creator: User;
}

export type ReplyType = {
  id: number;
  body: string;
  thread: ThreadType;
  user: User;
}
