class Config
  attr_accessor :app_name, :version
end

class App
  attr_reader :config

  def initialize
    @config = Config.new
  end

  def name
    config.app_name
  end

  def version
    config.version
  end

  # using yield, is equal below
  def configuration
    yield config
  end

  # pass block to a proc
  def configuration2 &config_block
    config_block.call(config)
  end
end

app = App.new
app.configuration do |config|
  config.app_name = "Cool app"
  config.version = "1.3.4"
end

puts app.name
puts app.version
