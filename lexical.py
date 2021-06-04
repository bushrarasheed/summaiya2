from ply import lex


token = ('Name','Number','plus','minus','divide','times','equal','lparen','rparen')
t_plus = r'\+'
t_minus = r'\-'
t_times = r'\*'
t_divide = r'/'
t_lparen = r'\('
t_rparen = r'\)'

def t_Number(t):
  r'\d+'
  t.value = int(t.value)
  return t

def t_newline(t):
  r'\n+'
  t.lexer.lineno += len(t.value)

t_ignore = '\t'

def t_error(t):
  print("invalid '%s'" % t.value[0])
  t.lexer.skip(1)

lexer = lex.lex()

data = '''
3 + 4 10
   + -20 *5
'''

lexer.input(data)
while True:
  tok = lexer.token()
  if not tok:
    break
  print(tok)