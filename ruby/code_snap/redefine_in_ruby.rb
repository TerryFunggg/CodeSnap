class Banner
  def initialize(text)
    @text = text
  end

  def to_s
    @text
  end

  def +@
    @text.upcase
  end

  def -@
    @text.downcase
  end
end


banner = Banner.new("Hi  I'm Terry Fung")

puts banner  # Hi  I'm Terry Fung
puts +banner # HI  I'M TERRY FUNG
puts -banner # hi  i'm terry fung

class Banner
  def !
    @text.reverse
  end
end

puts !banner # gnuF yrreT m'I  iH

# note that we don't need to new
# a new banner object
