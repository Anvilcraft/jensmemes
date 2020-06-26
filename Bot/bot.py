#!/usr/bin/env python3
import discord
from discord.ext import commands, tasks
from config import *
import pymysql
from hashlib import md5

bot = commands.Bot(command_prefix=prefix)

@bot.event #print the username and id to the console and change the game status
async def on_ready():
    print('Logged in as')
    print(bot.user.name)
    print(bot.user.id)
    print('------')

@bot.command()
async def register(ctx):
    if not ctx.guild.id in allowedDiscordServer:
        return
    name = ctx.author.name
    token = md5(str(ctx.author.id).encode()).hexdigest()
    user = bot.get_user(ctx.author.id)

    db = pymysql.connect(sqlServer,sqlUser,sqlPassword,sqlDatabase )
    cursor = db.cursor()
    cursor.execute("SELECT * FROM token WHERE name=%s AND token=%s", (name, token))
    if(len(cursor.fetchall()) == 0):
        cursor.execute("INSERT INTO token (name, token, uploadsLast24H) VALUES (%s, %s, 0)", (name, token))
        db.commit()
    db.close() 

    await user.send("Your Token for Jensmemes is " + token)

bot.run(token, bot=botAccount)#start the bot with the options in config.py